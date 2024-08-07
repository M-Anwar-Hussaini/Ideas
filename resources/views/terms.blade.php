@extends('layouts.layout')

@section('content')
  <div class="row">
    <div class="col-3">
      @include('partials._left-sidebar')

    </div>
    <div class="col-6">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat quidem ut id, necessitatibus, cupiditate
        accusamus
        repudiandae voluptatibus commodi ipsum iste in atque, ad deserunt? Suscipit officia laudantium facilis officiis
        dolores.</p>
    </div>

    <div class="col-3">
      @include('partials._search-bar')
      @include('partials._follow-box')
    </div>
  </div>
@endsection
