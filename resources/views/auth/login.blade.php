@extends('layouts.master')

@section('content')
    <div class="container text-white">
        <div class="col-6 mx-auto border rounded p-3">
            <h3 class="text-center">Login</h3>
            <form action="" method="POST">
                @csrf
                <div class="col form-group mb-4">
                    <label for="email"><b>Email</b></label>
                    <input class="form-control" type="text" name="email" id="name" placeholder="eg. example@gmail.com" value="{{ old("email") }}">
                    <x-error name="email" />
                </div>
                <div class="col form-group mb-4">
                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ old("email") }}">
                    <x-error name="password" />
                </div>
                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection