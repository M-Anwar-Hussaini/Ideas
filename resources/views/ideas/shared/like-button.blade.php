<div>
  @if (!Auth::user()->likesIdea($idea))
    <form action="{{ route('ideas.like', $idea) }}" method="POST">
      @csrf
      <button class="fw-light nav-link fs-6" type="submit">
        <span class="far fa-heart me-1"> </span> {{ $idea->likes->count() }}
      </button>
    </form>
  @else
    <form action="{{ route('ideas.unlike', $idea) }}" method="POST">
      @csrf
      <button class="fw-light nav-link fs-6" type="submit">
        <span class="fas fa-heart me-1"> </span> {{ $idea->likes->count() }}
      </button>
    </form>
  @endif
</div>
