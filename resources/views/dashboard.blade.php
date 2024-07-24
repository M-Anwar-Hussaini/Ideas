@extends('layouts.layout')
@section('content')
  <div class="row">
    <div class="col-3">
      @include('partials._left-sidebar')
    </div>
    <div class="col-6">
      @include('partials._success-message')
      @include('partials._error-message')
      @include('partials._submit-idea')
      <hr>
      @foreach ($ideas as $idea)
        <div class="mt-3">
          @include('partials._idea-card')
        </div>
      @endforeach
      <div class="my-3">
        {{ $ideas->links() }}
      </div>
    </div>
    <div class="col-3">
      @include('partials._search-bar')
      @include('partials._follow-box')
    </div>
  </div>
@endsection
