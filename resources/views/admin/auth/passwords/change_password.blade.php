@extends('admin.layouts')

@section('admin_content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <!-- Default form register -->
                <form class="text-center border border-light p-5" method="POST" action="{{ route('admin.update.password') }}">
                    @csrf

                    <p class="h4 mb-4">Chnage Password</p>

                    <!-- Old Password -->
                    <input type="password" id="oldpassword" class="form-control mb-4 @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="oldpassword" placeholder="Old Password">
                        @error('oldpassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <!-- New Password -->
                    <input type="password" id="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                        @error('password')
                            <span class="form-text text-muted mb-4" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                     <!-- Confirm Password -->
                    <input type="password" id="password-confirm" class="form-control mb-4" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Update</button>
                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
</div>
@endsection
