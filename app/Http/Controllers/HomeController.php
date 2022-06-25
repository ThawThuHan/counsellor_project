<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getCounsellor()
    {
        $users = User::latest()->get();
        return view('counsellors', ['users' => $users]);
    }

    public function showCounsellor($counsellor_id)
    {
        $user = User::find($counsellor_id);
        return view('counsellor', ['user' => $user]);
    }

    public function search()
    {
        return view('find-counsellor');
    }

    public function result(Request $request)
    {
        $request->validate([
            'pet' => 'required',
            'hobby' => 'required',
            'birth_order' => 'required',
            'color' => 'required',
        ]);
        $users = User::filter(request(['pet', 'hobby', 'birth_order', 'color']))->get();
        return view('counsellors', ['users' => $users]);
    }
}
