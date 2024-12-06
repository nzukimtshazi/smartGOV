@extends('layout.layout')

@section('content')
    <div class="container">
        <head>
            <h6>LOST YOUR PASSWORD?</h6>
            <h6>Please enter your username or email address. You will receive an OTP to create a new password via mobile.</h6>
        </head>
        <form method="POST" action="{{ route('resetPassword') }}">
            @csrf
            <div class="form-group">
                <label for="email">Enter Your Username or e-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
@endsection