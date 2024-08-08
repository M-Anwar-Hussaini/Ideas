@extends('layouts.layout')
@section('title', 'Register')
@section('content')
  <div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6">
      <form class="form mt-5" action="{{ route('register') }}" method="post">
        @csrf
        <h3 class="text-dark text-center">Register</h3>
        <div class="form-group">
          <label class="text-dark" for="name">Name:</label><br>
          <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" required>
          @error('name')
            <p class="text-danger mt-1 text-sm">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label class="text-dark" for="email">Email:</label><br>
          <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required>
          @error('email')
            <p class="text-danger mt-1 text-sm">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label class="text-dark" for="password">Password:</label><br>
          <input class="form-control" id="password" name="password" type="password" required>
          @error('password')
            <p class="text-danger mt-1 text-sm">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label class="text-dark" for="confirm-password">Confirm Password:</label><br>
          <input class="form-control" id="confirm-password" name="password_confirmation" type="password" required>
          @error('password_confirmation')
            <p class="text-danger mt-1 text-sm">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label class="text-dark" for="remember-me"></label><br>
          <input class="btn btn-dark btn-md" name="submit" type="submit" value="submit" required>
        </div>
        <div class="mt-2 text-right">
          <a class="text-dark" href="/login">Login here</a>
        </div>
      </form>
    </div>
  </div>
@endsection
