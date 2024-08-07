@if (session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
  </div>
@endif
