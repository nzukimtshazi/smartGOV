<!-- app/views/user/changePassword.blade.php -->

@extends('layout.layout')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('updatePassword') }}">
            @csrf

            <div class="form-group">
                <label for="mobileNo">Mobile No</label>
                <input type="text" name="mobileNo" id="mobileNo" class="form-control" value="{{ old('mobileNo') }}" required>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
@endsection