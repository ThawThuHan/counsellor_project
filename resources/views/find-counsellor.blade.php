@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="/css/find-counsellor.css">
@endsection

@section('content')
    <div class="container text-white">
        <h3 class="text-primary text-center">Find the right counsellor or therapist for you</h3>
        <h6 class="text-center">Answer the following question to find a appropriate counsellor for you.</h6>
        <div class="col-6 mx-auto find-counsellor">
            <form action="/find-result">
                @if ($errors->all())
                    <div class="text-danger">You need to answer all question.</div>
                @endif
                <div class="row mb-4">
                    <div class="col form-group">
                        <label for="color"><b>Favourite Color</b></label>
                        <select class="form-select" name="color" id="color">
                            <option value="">Choose your favourite Color.</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                            <option value="Blue">Blue</option>
                        </select>
                    </div>
                    <div class="col form-group">
                        <label for="hobby"><b>Hobby</b></label>
                        <select class="form-select" name="hobby" id="hobby">
                            <option value="">Choose your hobby.</option>
                            <option value="Swimming">Swimming</option>
                            <option value="Reading">Reading</option>
                            <option value="Tennis">Tennis</option>
                        </select>
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
                </div>
                <button class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
@endsection