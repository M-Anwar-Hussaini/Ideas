<div class="card">
  <div class="px-3 pb-2 pt-4">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img class="avatar-sm rounded-circle me-3"
          src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $user->name }}" alt="Mario Avatar" style="width:150px">
        <div>
          @if ($editing ?? false)
            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}">
          @else
            <h3 class="card-title mb-0"><a href="#"> {{ $user->name }} </a></h3>
            <span class="fs-6 text-muted">{{ $user->email }}</span>
          @endif
        </div>
      </div>
      <div class="align-self-start">
        @if (Auth::id() === $user->id)
          <a class="btn btn-gray" href="{{ route('users.edit', $user) }}">Edit</a>
        @endif
      </div>
    </div>
    <div class="mt-4 px-2">
      <h5 class="fs-5"> Bio : </h5>
      @if ($editing ?? false)
        <div class="fs-6 fw-light">
          <textarea class="form-control" id="bio" name="bio" rows="7">About</textarea>
        </div>
        <button class="btn btn-dark btn-sm" type="submit">Save</button>
      @else
        <p class="fs-6 fw-light">
          This book is a treatise on the theory of ethics, very popular during the
          Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
          from a line in section 1.10.32.
        </p>
      @endif
      <div class="d-flex justify-content-start">
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
      @endauth
    </div>
  </div>
</div>
