 @extends('layouts.app')

@section('content')
<hr><br>
<div class="container">
    <div class="row justify-content-center">
        <!-- Material form login -->
        <div class="card col-md-5" style="border: 1px solid  #FF5733; padding: 20px; border-radius: 25px; background:  #ebedef">
            <!-- Default form login -->
            <form class="text-center border border-light p-5" method="POST" action="{{ route('login') }}">
                @csrf
                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <input type="email" id="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your E-mail">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Password -->
                <input type="password" id="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div>
                    <!-- Forgot password -->
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="{{ route('register') }}">Register</a>
                </p>

                <!-- Social login -->
                <p>or sign in with:</p>

                <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

            </form>
            <!-- Default form login -->
        </div>
        <!-- Material form login -->
    </div>
</div>
<br><br><br><hr>

@endsection
