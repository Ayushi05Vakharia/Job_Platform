@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Job Listings</h1>
    @can('create', App\Models\Job::class)
        <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Post a Job</a>
    @endcan
    <ul class="list-group">
        @foreach($jobs as $job)
            <li class="list-group-item">
                <a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a>
            </li>
            @if ($job->user_id === auth()->id())
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
        @endforeach
    </ul>
</div>
@endsection

