@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- @if(auth()->check() && auth()->user()->hasRole('poster')) -->
            <h1>Create Job</h1>
            <form method="POST" action="{{ route('jobs.store') }}">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-2">Post Job</button>
            </form>
        <!-- @endif -->
    </div>
@endsection