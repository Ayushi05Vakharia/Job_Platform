@foreach ($jobs as $job)
    <div>
        <h4>{{ $job->summary }}</h4>
        <p>{{ $job->body }}</p>
        <small>Posted at: {{ $job->created_at->format('d M Y') }}</small>
    </div>
@endforeach
