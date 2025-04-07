<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('home');
});
*/

/*
Route::view('/', 'home');
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
Route::patch('/jobs/{job}/edit', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
*/

/*
Route::controller(JobController::class)->group(function (){
    Route::view('/', 'home');
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}/edit', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});
*/

Route::resource('jobs', JobController::class);

Route::view('/contact', 'contact');
