@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <!-- Default form register -->
                <form class="text-center border border-light p-5" method="POST" action="{{ route('register') }}">
                    @csrf

                    <p class="h4 mb-4">Sign up</p>

                    <!-- User name -->
                    <input type="text" id="name" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="User Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <!-- E-mail -->
                    <input type="email" id="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <!-- Password -->
                    <input type="password" id="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="form-text text-muted mb-4" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                     <!-- Confirm Password -->
                    <input type="password" id="password-confirm" class="form-control mb-4" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>
                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
</div>
@endsection
