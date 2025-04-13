@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $job->title }}</h1>
    <p>{{ $job->description }}</p>
    @auth
        <form method="POST" action="{{ route('jobs.interest', $job) }}">
            @csrf
            <button class="btn btn-info">I'm Interested</button>
        </form>
    @endauth
</div>
@endsection
