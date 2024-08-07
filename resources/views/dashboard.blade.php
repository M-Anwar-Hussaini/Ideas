@extends('layouts.layout')
@section('content')
  <div class="row">
    <div class="col-3">
      @include('partials._left-sidebar')
    </div>
    <div class="col-6">
      @include('partials._success-message')
      @include('partials._error-message')
      @include('ideas.shared._submit-idea')
      <hr>

      @forelse ($ideas as $idea)
        <div class="mt-3">
          @include('ideas.shared._idea-card')
        </div>
      @empty
        <div class="mt-3 text-center">
          <p>No result found.</p>
        </div>
      @endforelse
      <div class="my-3">
        {{ $ideas->withQueryString()->links() }}
      </div>
    </div>
    <div class="col-3">
      @include('partials._search-bar')
      @include('partials._follow-box')
    </div>
  </div>
@endsection
