 {{-- @extends('layouts.app')
@section('content') --}}
@extends('admin.admin_layouts')
@section('admin_content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">User <span class="tx-info tx-normal">Registration</span></div>
      <div class="tx-center mg-b-60">Ecommerce Site</div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Eamil" required>
      </div><!-- form-group -->
      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="password" class="form-control" placeholder="8801xxxxxxxxx" required>
      </div><!-- form-group -->
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" required>
      </div><!-- form-group -->
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password" required>
      </div><!-- form-group -->
      <button type="submit" class="btn btn-info btn-block">Sign Up</button>
      <div class="mg-t-40 tx-center">Already have an account? <a href="#" class="tx-info">Sign In</a></div>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
@endsection