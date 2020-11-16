@extends('layouts.app')

@section('content')
<hr><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-5" style="border: 1px solid  #FF5733; padding: 20px; border-radius: 25px; background:  #ebedef">
             <!-- Default form register -->
            <form class="text-center border border-light p-5" action="{{ route('register') }}" method="POST">
                @csrf
                <p class="h4 mb-4">Sign up</p>

                <!-- User name -->
                <input type="text" id="name" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Your Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <!-- User phone number -->
                <input type="text" id="phone" class="form-control mb-4 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Enter Phone Number">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

               <!-- E-mail -->
                <input type="email" id="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your E-mail">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <!-- Password -->
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Your Password">
                    @error('password')
                        <span class="form-text text-muted mb-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small>

                 <!-- Confirm Password -->
                    <input type="password" id="password-confirm" class="form-control mb-4" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Type Password.">


                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit">Sign up</button>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a>

            </form>
            <!-- Default form register -->
        </div>
    </div>
</div>
<br><br><br><hr>
@endsection
