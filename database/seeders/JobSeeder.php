<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $poster = User::where('role', 'poster')->first();
        $user = User::first();  
        if (!$poster) {
            $poster = User::factory()->create([
                'name' => 'Poster User',
                'email' => 'poster@example.com',
                'role' => 'poster',
            ]);
        }

        $jobs = [
            [
                'title' => 'Plumber Needed',
                'description' => 'Looking for an experienced plumber to fix bathroom leakage.',
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $user->id,
                'posted_by' => $user->name,
            ],
            [
                'title' => 'Electrician Required',
                'description' => 'Need someone to install new lights in office.',
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $user->id,
                'posted_by' => $user->name,
            ],
            [
                'title' => 'Gardener Job',
                'description' => 'Seasonal gardening work for 3 months.',
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $user->id,
                'posted_by' => $user->name,
            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
