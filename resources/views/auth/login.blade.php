@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center p-5"
        style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(to right,rgb(214, 212, 216),rgb(175, 181, 193));">
        <div class="card shadow-lg border-0 rounded-4 w-100"
            style="max-width: 550px;width: 50%; background-color: #ffffffee; padding: 30px;">
            <h2 class="mb-4 text-center text-dark fw-bold">Login to Your Account</h2>
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Field -->
                <div class="form-group mb-2" style="display: flex; justify-content: space-between;">
                    <label class="fw-semibold text-gray-800"><i class="bi bi-envelope-at-fill me-2"></i>Email</label>
                    <input type="email" name="email" class="form-control rounded-pill px-4 py-2"
                        placeholder="example@mail.com" value="{{ old('email') }}" required>
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group mb-2" style="display: flex; justify-content: space-between;">
                    <label class="fw-semibold text-gray-800"><i class="bi bi-lock-fill me-2"></i>Password</label>
                    <input type="password" name="password" class="form-control rounded-pill px-4 py-2"
                        placeholder="Enter password" required>
                    @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-primary w-full rounded-pill py-2 mt-4 mb-4 text-blue-500 fw-bold"
                    style="background-color:rgba(164, 177, 228, 0.93);">Login</button>
                <!-- Other Link -->
                <div style="display: flex; justify-content: space-between;">
                    <div class="text-center mt-2">
                        <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700">Forgot
                            Password?</a>
                    </div>

                    <div class="text-center mt-2">
                        New User ->
                        <a href="{{ route('register') }}"
                            class="btn btn-primary w-full rounded-pill py-2 mt-4 text-blue-500 fw-bold"
                            style="background-color:rgba(164, 177, 228, 0.93); padding:10px">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection