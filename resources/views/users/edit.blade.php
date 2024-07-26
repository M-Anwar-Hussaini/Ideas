@extends('layouts.layout')
@section('content')
  <div class="row">
    <div class="col-3">
      @include('partials._left-sidebar')
    </div>
    <div class="col-6">
      @include('partials._success-message')
      @include('partials._error-message')
      <div class="mb-3">
        @include('partials._user-edit-card')
      </div>
    </div>
    <div class="col-3">
      @include('partials._search-bar')
      @include('partials._follow-box')
    </div>
  </div>
@endsection
