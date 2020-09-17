@extends('admin.layouts')

@section('admin_content')
	<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
	<form method="POST" action="{{ route('admin.login') }}">
		@csrf
	  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Login as <span class="tx-info tx-normal">Admin</span></div>
        <div class="tx-center mg-b-60">Professional E-commerce Project</div>
        <div class="form-group">
          <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
          	@error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
          <a href="{{ route('admin.password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
      </div><!-- login-wrapper -->
	</form>
    </div><!-- d-flex -->
@endsection
