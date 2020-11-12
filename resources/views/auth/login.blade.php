@extends('admin.admin_layouts')
@section('admin_content')
        <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
              <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Login <span class="tx-info tx-normal">Form</span></div>
              <div class="tx-center mg-b-60">Ecommerce Site</div>
            <form action="{{ route('login')}}" method="post">
               @csrf
              <div class="form-group">
                <label for="emaiPhone">Eamil/Phone</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email/Phone">
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
                <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
              </div><!-- form-group -->
              <button type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>   
            <br>
            <button class="btn btn-primary btn-block"> <i class="fa fa-facebook"></i> Login With Facebook</button>          
            <button class="btn btn-danger btn-block"> <i class="fa fa-google-plus"></i> Login With Google</button>          
          </div><!-- d-flex -->
@endsection
