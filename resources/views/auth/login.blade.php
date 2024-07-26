@extends('layouts.layout')
@section('content')
  <div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6">
      <form class="form mt-5" action="{{ route('authenticate') }}" method="post">
        @csrf
        <h3 class="text-dark text-center">Login</h3>
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
        <div class="form-group">
          <label class="text-dark" for="remember-me"></label><br>
          <input class="btn btn-dark btn-md" name="submit" type="submit" value="submit" required>
        </div>
        <div class="mt-2 text-right">
          <a class="text-dark" href="{{ route('register') }}">Register Here</a>
        </div>
      </form>
    </div>
  </div>
@endsection
