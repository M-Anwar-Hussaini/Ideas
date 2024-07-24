<div class="card">
  <div class="card-header border-0 pb-0">
    <h5 class="">Search</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('home') }}" method="GET">
      <input class="form-control w-100" id="search" name="search" type="text" placeholder="...                    ">
      <button class="btn btn-dark mt-2"> Search</button>
    </form>
  </div>
</div>
