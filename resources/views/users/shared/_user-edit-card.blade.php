<div class="card">
  <div class="px-3 pb-2 pt-4">
    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <img class="avatar-sm rounded-circle me-3" src="{{ $user->getImageURL() }}" alt="Mario Avatar"
            style="width:150px">
          <div>
            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}">
            @error('name')
              <p class="text-danger fs-6 mt-2">{{ $message }}</p>
            @enderror
          </div>
        </div>
        @if (Auth::id() === $user->id)
          <div class="align-self-start">
            <a class="btn btn-gray" href="{{ route('users.show', $user) }}">View</a>
          </div>
        @endif
      </div>

      <div class="mt-3">
        <label for="image">Profile picture</label>
        <input class="form-control" id="image" name="image" type="file">
        @error('image')
          <p class="text-danger fs-6 mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-4 px-2">
        <h5 class="fs-5"> Bio : </h5>
        <div class="fs-6 fw-light">
          <textarea class="form-control" id="bio" name="bio" rows="7">{{ $user->bio }}</textarea>
          @error('bio')
            <p class="text-danger fs-6 mt-2">{{ $message }}</p>
          @enderror
        </div>
        <button class="btn btn-dark btn-sm my-3" type="submit">Save</button>
      </div>
      {{-- <div class="d-flex justify-content-start">
        <a class="fw-light nav-link fs-6 me-3" href="#"> <span class="fas fa-user me-1">
          </span> 0 Followers </a>
        <a class="fw-light nav-link fs-6 me-3" href="#"> <span class="fas fa-brain me-1">
          </span> {{ count($user->ideas) }} </a>
        <a class="fw-light nav-link fs-6" href="#"> <span class="fas fa-comment me-1">
          </span> {{ $user->comments->count() }} </a>
      </div>
      @auth
        @if (Auth::id() != $user->id)
          <div class="mt-3">
            <button class="btn btn-primary btn-sm"> Follow </button>
          </div>
        @endif
      @endauth --}}
    </form>
  </div>
</div>
