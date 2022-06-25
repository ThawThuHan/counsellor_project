<x-profile-layout>
    <div class="content">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Appointment</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($booking as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->booking_date }}</td>
                    <td>{{ $book->booking_time }}</td>
                    <td>{{ $book->appointment_method }}</td>
                    <td>
                        <a href="/profile/booking/{{ $book->id }}" class="btn btn-sm btn-primary">view</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</x-profile-layout>