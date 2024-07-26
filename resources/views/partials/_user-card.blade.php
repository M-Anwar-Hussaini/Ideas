<div class="card">
  <div class="px-3 pb-2 pt-4">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img class="avatar-sm rounded-circle me-3" src="{{ $user->getImageURL() }}" alt="{{ $user->name }}"
          style="width:150px">
        <div>
          <h3 class="card-title mb-0"><a href="{{ route('users.show', $user) }}"> {{ $user->name }} </a></h3>
          <span class="fs-6 text-muted">{{ $user->email }}</span>
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
      <p class="fs-6 fw-light">
        {{ $user->bio }}
      </p>
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
