@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="role" name="role" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Register</button>
    </form>
</div>
@endsection
