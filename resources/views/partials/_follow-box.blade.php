<div class="card mt-3">
  <div class="card-header border-0 pb-0">
    <h5 class="">Top Users</h5>
  </div>
  <div class="card-body">
    @forelse ($topUsers as $user)
      <div class="hstack mb-3 gap-2">
        <div class="avatar">
          <a href="{{ route('users.show', $user) }}"><img class="avatar-img rounded-circle"
              src="{{ $user->getImageURL() }}" alt="{{ $user->name }}" width="50px"></a>
        </div>
        <div class="overflow-hidden">
          <a class="h6 mb-0" href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
          <p class="small text-truncate mb-0">{{ $user->email }}</p>
        </div>
      </div>
    @empty
      <p>There isn't any user</p>
    @endforelse
  </div>
</div>
