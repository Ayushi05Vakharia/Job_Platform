<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterestController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->id(); // or $request->user()->id;
        $jobId = $request->input('job_id');

        DB::table('job_user_interest')->insert([
            'user_id' => $userId,
            'job_id' => $jobId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('jobs.index')->with('success', 'Great Job!');
    }

}

