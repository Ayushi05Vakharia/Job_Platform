@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center p-5"
        style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(to right,rgb(214, 212, 216),rgb(175, 181, 193));">
        <div class="card shadow-lg border-0 rounded-4 w-100"
            style="max-width: 550px;width: 50%; background-color: #ffffffee; padding: 30px;">
            <div class="d-flex" style="display: flex; justify-content:space-between">
                <h2 class="mb-4 text-center text-dark fw-bold">Selected Job View</h2>
                <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-outline-primary rounded-pill"
                    style="background-color:rgba(164, 177, 228, 0.93); padding: 5px; height: fit-content; margin-top: auto;">
                    Back to Job List
                </a>
            </div>
            <h1>{{ $job->title }}</h1>
            <p>{{ $job->description }}</p>
            @auth
                <form method="POST" action="{{ route('jobs.interest', $job) }}">
                    @csrf

                    <button type="submit" class="btn btn-primary w-full rounded-pill py-2 mt-4 mb-4 text-blue-500 fw-bold"
                        style="background-color:rgba(164, 177, 228, 0.93);">I'm Interested</button>
                </form>


            @endauth
        </div>
    </div>
@endsection