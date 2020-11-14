@extends('frontend.layouts.master')
@section('main-content')
<h4 class="text-secondary text-center">Welcome to Ecom  Please Login</h4>
          <div class="card offset-4 p-4" style="width: 50%;">
              <p class="text-right">Don't have an account? <a href="{{ route('register') }}"class="text-info text-decoration-none" style="border:none;">Sign Up</a></p> 
            <div class="row">
              <div class="col-md-6">
                <form action="{{ route('login')}}" method="post">
                  @csrf
                 <div class="form-group">
                   <label for="emaiPhone">Eamil/Phone</label>
                   <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  name="email" required autocomplete="email" autofocus placeholder="Email/Phone">
                   @error('email')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                @enderror
                 </div><!-- form-group -->
                 <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                   @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                 </div><!-- form-group -->
                 <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mt-2 text-right">Forgot password?</a>
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
               </form>
               <p>or Sign with</p>
                <button class="btn btn-primary btn-block"> <i class="fab fa-facebook-f mr-2"></i>Facebook</button>          
                <button class="btn btn-danger btn-block"> <i class="fab fa-google-plus-g mr-2"></i>Google</button>
              </div>
            </div>
          </div>
         
@endsection
