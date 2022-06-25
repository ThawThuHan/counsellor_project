<x-profile-layout>
  <div class="content">
      <div class="row">
          <div class="col-2">
              <img class="me-4" width="100%" src="{{ $user->image }}" alt="">
          </div>
          <div class="col-10">
              <h3>{{ $user->name }}</h3>
              <h5><span class="me-2"><i class="fa-solid fa-envelope"></i></span>{{ $user->email }}</h5>
              <h5><span class="me-2"><i class="fa-solid fa-phone"></i></span>{{ $user->phone }}</h5>
              <div>
                  <div class="d-inline-block me-4">
                      <span><b>Favourite Pet</b> : {{ $user->pet }}</span> <br>
                      <span><b>Hobby</b> : {{ $user->hobby }}</span>
                  </div>
                  <div  class="d-inline-block">
                      <span><b>Birth Order</b> : 
                          @if ($user->birth_order === 0)
                              The Only Child
                          @elseif ($user->birth_order === 1)
                              First Born
                          @elseif ($user->birth_order === 2)
                              Middle Born
                          @else
                              Last Born
                          @endif
                      </span> <br>
                      <span><b>Favourite Color</b> : {{ $user->color }}</span>
                  </div>
              </div>
          </div>
      </div>
      <div class="my-4">
          <p>{{ $user->description }}</p>
      </div>
      <div>
        <button class="btn btn-info">Edit</button>
      </div>
  </div>
</x-profile-layout>