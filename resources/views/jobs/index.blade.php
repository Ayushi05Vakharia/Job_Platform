@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center p-5 mb-5"
        style="display: block;justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(to right,rgb(214, 212, 216),rgb(175, 181, 193));">
        <!-- <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Post a Job</a> -->
        <div class="d-flex mb-4" style="display:flex">
            <h2 class="mb-4 text-center text-dark fw-bold" style="margin-right: 15px;">Job Listing</h2>
            @if(auth()->check())
                @if (auth()->user()->role == 'poster')

                    <a href="{{ route('jobs.create') }}" class="btn btn-sm btn-outline-primary rounded-pill"
                        style="background-color:rgba(164, 177, 228, 0.93); padding: 5px; height: fit-content; margin-top: auto;">
                        Post a Job
                    </a>
                @endif
            @endif
        </div>


        <div class="list-group" style="display:block;justify-content:center ;align-items:center; padding-left: 50px;">
            @foreach($jobs as $job)
                <div class="card shadow-lg border-0 rounded-4 w-100"
                    style="display: block;max-width: 550px;width: 50%; background-color: #ffffffee; padding: 20px;">
                    <div style="display: flex; justify-content: space-between;">
                    <li class="d-flex list-group-item">
                        <a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a>
                        <p>Posted by : {{ $job->posted_by }}</p>
                    </li>
                    <p>Created at : {{ $job->created_at->format('d M Y') }}</p>
                    </div>
                    <!-- <p>{{auth()->check()  }}</p> -->
                    @if(auth()->check())
                        @if (auth()->user()->role == 'poster')
                            <div class="d-flex" style="display: flex;">

                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this job?');" style="margin-right: 8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary w-full rounded-pill py-2 mt-4 text-blue-500 fw-bold"
                                        style="background-color:rgba(164, 177, 228, 0.93); padding: 5px;">Delete</button>
                                </form>
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-outline-primary rounded-pill"
                                    style="background-color:rgba(164, 177, 228, 0.93); padding: 5px; height: fit-content; margin-top: auto;">
                                    Edit
                                </a>

                            </div>
                        @endif
                    @endif

                </div>
            @endforeach

        </div>
    </div>
@endsection