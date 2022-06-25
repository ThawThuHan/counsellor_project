<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function postRegister(Request $request)
    {
        $formData = $request->validate([
            "name" => "required|min:3|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed",
            "password_confirmation" => "required|min:6",
            "image" => "required",
            "phone" => "required|min:9|max:11",
            "description" => "required|min:10",
            "color" => "required",
            "hobby" => "required",
            "birth_order" => "required",
            "pet" => "required",
        ]);

        $formData['name'] = ucwords($request->name);
        $formData['password'] = bcrypt($request->password);

        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("profile");
            $formData['image'] = asset("storage/" . $path);
        }

        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with("success", "Welcome, " . $user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $formData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ], [
            'email.exists' => 'Your email is not registered',
        ]);
        if (auth()->attempt($formData)) {
            return redirect('/')->with('success', 'Welcome Back!');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Your Credential is Wrong!',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
