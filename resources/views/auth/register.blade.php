@extends('layouts.master')

@section('content')
    <div class="container text-white">
        <h5 class="text-center text-primary">THE MOST EFFECTIVE WAY TO PROMOTE YOUR COUNSELLING OR THERAPY BUSINESS.</h5>
        <h3 class="text-center mb-4">Register</h3>
        <p class="p-3 bg-warning border rounded text-dark">
            This form is to register as a professional member to advertise your services on our directory. If you are not a professional and are looking for help, you can start <a href="">there</a>.
        </p>

        <div class="col-8 mx-auto">
            <form action="/register" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col form-group">
                        <label for="name"><b>Name</b></label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="eg. Mg Mg" value="{{ old("name") }}">
                        <x-error name="name" />
                    </div>
                    <div class="col form-group">
                        <label for="email"><b>Email</b></label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="eg. example@gmail.com" value="{{ old("email") }}">
                        <x-error name="email" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col form-group">
                        <label for="password"><b>Password</b></label>
                        <input class="form-control" type="password" name="password" id="password">
                        <x-error name="password" />
                    </div>
                    <div class="col form-group">
                        <label for="password_confirmation"><b>Confirm Password</b></label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                        <x-error name="password_confirmation" />
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="image"><b>Your Profile Picture</b></label>
                    <input class="form-control" type="file" name="image" id="image">
                    <x-error name="image" />
                </div>
                <div class="form-group mb-4">
                    <label for="phone"><b>Phone Number</b></label>
                    <input class="form-control" type="phone" name="phone" id="phone" value="{{ old("phone") }}">
                    <x-error name="phone" />
                </div>
                <div class="form-group mb-4">
                    <label for="description"><b>General Infromation about You and Your service</b></label>
                    <textarea class="form-control" name="description" id="description" rows="4">{{ old("description") }}</textarea>
                    <x-error name="description" />
                </div>
                <hr>
                <p>Answer the following question for our client. Your answer will help our client to find appropriate counsellors.</p>
                <div class="row mb-4">
                    <div class="col form-group">
                        <label for="color"><b>Favourite Color</b></label>
                        <select class="form-select" name="color" id="color">
                            <option value="">Choose your favourite Color.</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                            <option value="Blue">Blue</option>
                        </select>
                        <x-error name="color" />
                    </div>
                    <div class="col form-group">
                        <label for="hobby"><b>Hobby</b></label>
                        <select class="form-select" name="hobby" id="hobby">
                            <option value="">Choose your hobby.</option>
                            <option value="Swimming">Swimming</option>
                            <option value="Reading">Reading</option>
                            <option value="Tennis">Tennis</option>
                        </select>
                        <x-error name="hobby" />
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="birth_order"><b>Your Birth Order</b></label>
                    <select class="form-select" name="birth_order" id="birth_order">
                        <option value="">choose one.</option>
                        <option value="1">First Borns</option>
                        <option value="2">Middle Borns</option>
                        <option value="3">Last Borns</option>
                        <option value="0">The Only Child</option>
                    </select>
                    <x-error name="hobby" />
                </div>
                <div class="form-group mb-4">
                    <label for="career"><b>Favourite Pet</b></label>
                    <select class="form-select" name="pet" id="career">
                        <option value="">What is your favourite pet?</option>
                        <option value="cat">Cat</option>
                        <option value="dog">Dog</option>
                        <option value="bird">Bird</option>
                        <option value="other">Other</option>
                    </select>
                    <x-error name="career" />
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection