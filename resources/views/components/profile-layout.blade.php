@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="/css/user_profile.css">
@endsection

@section('content')
<div class="container text-white">
    <h3>Your Profile</h3>
    <div class="row">
        <div class="col-2">
            <ul class="list-group">
              <li class="list-group-item list-group-item-action list-group-item-dark">
                <a href="">Profile</a>
              </li>
              <li class="list-group-item list-group-item-action list-group-item-dark">
                <a href="/profile/booking">Booking List</a>
              </li>
            </ul>
        </div>
        <div class="col-10">
            {{ $slot }}
        </div>
    </div>
</div>
@endsection