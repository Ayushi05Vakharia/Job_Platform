@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Login</button>
    </form>
</div>
@endsection