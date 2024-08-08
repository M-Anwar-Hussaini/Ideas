<div class="card">
  <div class="px-3 pb-2 pt-4">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img class="avatar-sm rounded-circle me-2" src="{{ $idea->user->getImageURL() }}" alt="{{ $idea->user->name }}"
          style="width:50px">
        <div>
          <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user) }}"> {{ $idea->user->name }} </a></h5>
        </div>
      </div>
      <div class="row">
        @can('update', $idea)
          <a class="btn btn-warning btn-sm col me-2" href="{{ route('ideas.edit', $idea) }}">edit</a>
        @endcan

        <a class="btn btn-info btn-sm col" href="{{ route('ideas.show', $idea) }}">view</a>
        @can('delete', $idea)
          <form class="col" action="{{ route('ideas.destroy', $idea) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm ms-auto">X</button>
          </form>
        @endcan

      </div>
    </div>
  </div>
  <div class="card-body">
    @if ($editing ?? false)
      <form action="{{ route('ideas.update', $idea) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <textarea class="form-control" id="idea" name="content" rows="3">{{ $idea->content }}</textarea>
          @error('content')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
          @enderror
        </div>
        <div class="">
          <button class="btn btn-dark" type="submit"> Update </button>
        </div>
      </form>
    @else
      <p class="fs-6 fw-light text-muted">
        {{ $idea->content }}
      </p>
    @endif
    <div class="d-flex justify-content-between">
      @auth
        @include('ideas.shared.like-button')
      @endauth
      @guest
        <a class="fw-light nav-link fs-6" href="{{ route('login') }}">
          <span class="far fa-heart me-1"> </span> {{ $idea->likes->count() }}
        </a>
      @endguest
      <div>
        <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
          {{ $idea->created_at->diffForHumans() }} </span>
      </div>
    </div>
    @include('ideas.shared._comments-box')
  </div>
</div>
