@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="/css/counsellors.css">
@endsection

@section('content')
    <div class="container text-white">
        <h3 class="text-center"><u>Our Counsellors</u></h3>
        <div class="row">
            @foreach ($users as $user)
            <div class="col-6">
                <div class="counsellor">
                    <img src="{{$user->image}}" alt="">
                    <div class="info">
                        <h5>{{ $user->name }}</h5>
                        <h6>{{ $user->email }}</h6>
                        <p>{{ mb_strimwidth($user->description, 0, 100, '...', 'utf-8') }}</p>
                        <div>
                            <a class="btn btn-primary" href="/booking/{{ $user->id }}">Booking</a>
                            <a class="btn btn-outline-primary" href="/counsellors/{{ $user->id }}">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection