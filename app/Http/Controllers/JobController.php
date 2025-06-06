<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class JobController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:poster')->only(['create', 'store']);
    // }


    public function index()
    {
        // Retrieve jobs and pass them to the view
        $jobs = Job::with('interestedUsers')
        ->where('created_at', '>=', Carbon::now()->subMonths(2))
            ->orderBy('created_at', 'desc')
            ->get();

        $user = auth()->user()->load('interestedJobs');
        return view('jobs.index', compact('jobs', 'user'));
    }

    public function create()
    {
        // $this->authorize('create', Job::class);
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create the job post
        $job = new Job();
        $job->title = $request->input('title');
        $job->description = $request->input('description', 'No description provided');
        $job->user_id = auth()->id(); // Set the user_id
        $job->posted_by = auth()->user()->name; // Set posted_by to the user who is creating the job
        $job->save();

        // Redirect after successful post
        return redirect()->route('jobs.index')->with('success', 'Job posted successfully!');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job) // Use the Job model directly
    {
        // Check if the authenticated user is the owner of the job
        if (auth()->check()) {
            $user = auth()->user();
            // dd($user->role == 'poster');
            if ($user->role == 'poster') {
                return view('jobs.edit', compact('job'));
            } else {
                // Return the view with the job data
                return redirect()->route('jobs.index')->with('error', 'You do not have permission to edit this job.');
            }
        }
    }

    public function update(Request $request, $id)
    {
        // Find the job by ID
        $job = Job::findOrFail($id);
        $user = auth()->user();
        // Check if the user is authorized to edit the job
        if ($user->role != 'poster') {
            return redirect()->route('jobs.index')->with('error', 'You do not have permission to update this job.');
        }

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update job with new data
        $job->title = $request->input('title');
        $job->description = $request->input('description', 'No description provided');
        $job->save();

        // Redirect with success message
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        // Ensure the user is the owner of the job
        if (auth()->check()) {
            $user = auth()->user();
            if (@$user->role != 'poster') {
                return redirect()->route('jobs.index')->with('error', 'You do not have permission to delete this job.');
            } else {

                // Delete the job
                $job->delete();

                // Redirect to jobs index with success message
                return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
            }
        }
    }

}