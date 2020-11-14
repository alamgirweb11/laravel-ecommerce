@extends('frontend.layouts.master')
@section('main-content')
<h4 class="text-center text-secondary ml-6">Registration form</h4>
  <div class="card offset-4 p-4" style="width: 50%;">
    <form action="{{ route('register') }}" method="post">
      @csrf
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label for="email">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name" required>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Eamil" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->
      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('mobile') }}" placeholder="8801xxxxxxxxx" required>
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required autocomplete="new-password">
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->
      <button type="submit" class="btn btn-info btn-block">Sign Up</button>
      <div class="mt-2 tx-center">Already have an account? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
      </div>
    </div>
  </form>
  </div>
@endsection