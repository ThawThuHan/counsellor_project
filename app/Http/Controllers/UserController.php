<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user_profile.index', ['user' => $user]);
    }

    public function getBooking()
    {
        $booking = Booking::where('counsellor_id', auth()->id())->get();
        return view('user_profile.booking-list', ['booking' => $booking]);
    }

    public function showBooking($booking_id)
    {
        $booking = Booking::find($booking_id);
        return view('user_profile.show-booking', ['booking' => $booking]);
    }

    public function acceptBooking($booking_id)
    {
        $booking = Booking::find($booking_id);
        $booking->accept = 'yes';
        $booking->update();
        return back();
    }

    public function rejectBooking($booking_id)
    {
        $booking = Booking::find($booking_id);
        $booking->accept = 'no';
        $booking->update();
        return back();
    }
}
