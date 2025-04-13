@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center p-5"
        style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(to right,rgb(214, 212, 216),rgb(175, 181, 193));">
        <div class="card shadow-lg border-0 rounded-4 w-100"
            style="max-width: 550px;width: 50%; background-color: #ffffffee; padding: 30px;">
            <h2 class="mb-4 text-center text-dark fw-bold">Edit Job</h2>

            <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="form-group mb-2" style="display: flex; justify-content: space-between;">
                    <label class="fw-semibold text-gray-800"><i class="bi bi-envelope-at-fill me-2"></i>Job Title</label>
                    <input type="text" name="title" class="form-control rounded-pill px-4 py-2"
                        value="{{ old('title', $job->title) }}" required>

                </div>
                <div class="form-group mb-2" style="display: flex; justify-content: space-between;">
                    <label class="fw-semibold text-gray-800"><i class="bi bi-envelope-at-fill me-2"></i>Description</label>
                    <textarea id="description" name="description"
                        class="form-control rounded-pill px-4 py-2">{{  old('description', $job->description) }}</textarea>

                </div>

                <!-- <div class="form-group">
                            <label for="title">Job Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" class="form-control"
                                required>
                        </div> -->
                <!-- 
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"
                            class="form-control">{{ old('description', $job->description) }}</textarea>
                    </div> -->
                    <button type="submit"
                    class="btn btn-primary w-full rounded-pill py-2 mt-4 text-blue-500 fw-bold"
                    style="background-color:rgba(164, 177, 228, 0.93);"
                    >Update Job</button>
                <!-- <button type="submit" class="btn btn-primary">Update Job</button> -->
            </form>
        </div>
    </div>
@endsection