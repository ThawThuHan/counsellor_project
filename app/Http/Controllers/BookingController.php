<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BookingController extends Controller
{
    public function index($counsellor_id)
    {
        $counsellor = User::find($counsellor_id);
        return view('booking', ['counsellor' => $counsellor]);
    }

    public function store(Request $request, $counsellor_id)
    {
        $formData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'appointment_method' => 'required',
            'message' => 'required|min:10',
            'booking_date' => 'required',
            'booking_time' => 'required',
        ]);
        $formData['counsellor_id'] = $counsellor_id;
        $booking = Booking::create($formData);
        return back()->with('success', 'Your Booking successful! we will contact you soon...');
    }

    public function getAvailableTime()
    {
        if (request()->counsellor_id && request()->date) {
            $date = request()->date;
            $booking = Booking::where("booking_date", $date)->where("counsellor_id", request()->counsellor_id)->get();
            $booking = $booking->pluck('booking_time');
            return json_encode([
                "message" => "success",
                "value" => $booking,
            ]);
        }
        return json_encode([
            "message" => "fail",
        ]);
    }
}
