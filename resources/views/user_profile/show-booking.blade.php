<x-profile-layout>
    <div class="content">
        <h3 class="mb-4">Booking Detail</h3>
        <hr>
        <div class="mb-4">
            <b>Name</b>: {{ $booking->name }} <br>
            <b>Email</b> : {{ $booking->email }} <br>
            <b>Phone</b> : {{ $booking->phone }} <br>
            <b>Appointment</b> : {{ $booking->appointment_method }} <br>
            <b>Message</b> : {{ $booking->message }} <br>
            <hr>
            <b>Date & Time</b> : {{ $booking->booking_date }}/ {{ $booking->booking_time }}
        </div>
        <div>
            @if ($booking->accept === 'none')
            <form class="d-inline-block" action="/profile/booking/{{ $booking->id }}/accept" method="POST">
                @csrf
                @method('put')
                <button class="btn btn-primary">accept</button>
            </form>
            <form class="d-inline-block" action="/profile/booking/{{ $booking->id }}/reject" method="POST">
                @csrf
                @method('put')
                <button class="btn btn-danger">reject</button>
            </form>
            @else
                @if ($booking->accept === 'yes')
                    <span class="btn btn-success">Booking Accepted!</span>
                @endif
            @if ($booking->accept === 'no')
                <span class="btn btn-danger">Booking Rejected!</span>
            @endif
            @endif
        </div>
    </div>
</x-profile-layout>