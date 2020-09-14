@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
        
                <!-- Default form login -->
                <form class="text-center border border-light p-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <p class="h4 mb-4">Sign in</p>

                    <!-- Email -->
                    <input type="email" id="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <!-- Password -->
                    <input type="password" id="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="d-flex justify-content-around">
                        <div>
                            <!-- Remember me -->
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div>
                            <!-- Forgot password -->
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                        <a href="{{ route('register') }}">Register</a>
                    </p>
                </form>
                <!-- Default form login --> 
                
            </div>
        </div>
    </div>
</div>
@endsection
