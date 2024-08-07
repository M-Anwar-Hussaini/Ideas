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
      @include('users.shared.user-stats')
      @auth
        @if (Auth::id() != $user->id)
          <div class="mt-3">
            @if (Auth::user()->follows($user))
              <form action="{{ route('users.unfollow', $user) }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm" type="submit"> Unfollow </button>
              </form>
            @else
              <form action="{{ route('users.follow', $user) }}" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm" type="submit"> Follow </button>
              </form>
            @endif
          </div>
        @endif
      @endauth
    </div>
  </div>
</div>
