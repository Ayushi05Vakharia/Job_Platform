<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $jobs = Job::all(); 
        $jobs = Job::with('interestedUsers')
        ->where('created_at', '>=', Carbon::now()->subMonths(2))
            ->orderBy('created_at', 'desc')
            ->get();

        $user = auth()->user()->load('interestedJobs');
        return view('jobs.index', compact('jobs', 'user'));
        // return view('jobs.index', compact('jobs'));
    }
}
