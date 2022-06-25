@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="/css/booking.css">
@endsection

@section('content')
    <div class="container text-white">
        <h3 class="text-center mb-4">Booking Appointment</h3>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-4">
                <div class="profile">
                    <img src="{{ $counsellor->image }}" alt="">
                    <h4>{{ $counsellor->name }}</h4>
                    <h6>{{ $counsellor->email }}</h6>
                </div>
            </div>
            <div class="col-8">
                <div class="booking-form">
                    <h5 class="">Get in touch with {{ $counsellor->name }}</h5>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col form-group mb-4">
                                <label for="name"><b>Name</b></label>
                                <input class="form-control" type="text" name="name" id="name">
                                <x-error name="name" />
                            </div>
                            <div class="col form-group mb-4">
                                <label for="name"><b>Email</b></label>
                                <input class="form-control" type="email" name="email" id="email">
                                <x-error name="email" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col form-group">
                                <label for="phone"><b>Phone</b></label>
                                <input class="form-control" type="phone" name="phone" id="phone">
                                <x-error name="phone" />
                            </div>
                            <div class="col form-group">
                                <label for="appointment"><b>Appointment</b></label>
                                <select class="form-select" name="appointment_method" id="appointment">
                                    <option value="">Select Appointment Method</option>
                                    <option value="phone">Phone Call</option>
                                    <option value="meeting">Online Meeting</option>
                                </select>
                                <x-error name="appointment_method" />
                            </div>
                        </div>
                        <div class="col form-group mb-4">
                            <label for="message"><b>Your Message</b></label>
                            <textarea class="form-control" name="message" id="message"></textarea>
                            <x-error name="message" />
                        </div>
                        <hr>
                        <div class="form-group mb-4">
                            <label for="booling_date"><b>Select Booking Date</b></label>
                            <input class="form-control" type="date" min="{{ now()->toDateString() }}" name="booking_date" id="booking_date" onchange="getTime(this.value, {{$counsellor->id}})">
                            <x-error name="booking_date" />
                        </div>
                        <div class="booking-time mb-4">
                            <ul class="booking-time-ul">

                            </ul>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function getTime(date, counsellor_id){
            fetch(`/check/?date=${date}&counsellor_id=${counsellor_id}`)
            .then(response => response.json())
            .then(data => {
                let reserveTime = data['value'];
                let booking_time = ['09:00:00', '10:00:00', '11:00:00', '12:00:00'];
                const ulTag = document.querySelector(".booking-time-ul");
                ulTag.innerHTML = '';
                booking_time.filter(element => {
                    if(reserveTime.includes(element)){
                        ulTag.innerHTML += `<li><div class="form-group">
                                            <input type="radio" name="booking_time" id="${element}" value="${element}" disabled>
                                            <label for="${element}"><b>${element}</b></label>
                                        </div></li>`;
                    } else {
                        ulTag.innerHTML += `<li><div class="form-group">
                                            <input type="radio" name="booking_time" id="${element}" value="${element}">
                                            <label for="${element}"><b>${element}</b></label>
                                        </div></li>`;
                    }
                })
            })
        }
    </script>
@endsection