<div>
  <form action="{{ route('ideas.comments.store', $idea) }}" method="POST">
    @csrf
    <div class="mb-3">
      <textarea class="fs-6 form-control" name="content" rows="1"></textarea>
    </div>
    <div>
      <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
    </div>
  </form>
  <hr>
  @forelse ($idea->comments as $comment)
    <div class="d-flex align-items-start">
      <img class="avatar-sm rounded-circle me-2" src="{{ $comment->user->getImageURL() }}" alt="Luigi Avatar"
        style="width:35px">
      <div class="w-100">
        <div class="d-flex justify-content-between">
          <h6 class="mt-1">{{ $comment->user->name }}</h6>
          <small class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
        <p class="fs-6 fw-light mt-3">
          {{ $comment->content }}
        </p>
      </div>
    </div>
  @empty
    <p class="mt-4 text-center">No comments found.</p>
  @endforelse
</div>
