@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Job</h2>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $job->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
