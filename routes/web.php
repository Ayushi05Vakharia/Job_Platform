<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
*/

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');



Route::get('/', [JobController::class, 'index'])->name('home');

// Authentication routes (only call once)
Auth::routes();

// Authenticated users can access jobs and interest-related actions



Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::resource('jobs', JobController::class);
    });
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::resource('jobs', JobController::class);
    // Resource routes for job CRUD operations
    // Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');


    // Route::middleware(['auth'])->get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');



    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    // Route::get('/jobs/create', [JobController::class, 'create'])->middleware('role:poster');

    // Display the edit form
    // Route::middleware(['auth'])->get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

    // Update the job details
    Route::middleware(['auth'])->put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    // Route::post('/interest', [InterestController::class, 'store'])->middleware('auth');
    Route::post('/interest', [InterestController::class, 'store'])->name('jobs.interest');
    // Route::post('/jobs/{job}/interest', [InterestController::class, 'store'])->name('jobs.interest');
    Route::middleware(['auth'])->delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

