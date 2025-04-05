<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = Job::with('employer')->paginate(3);

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs/{id}', function ($id){

    /*
    Arr::first($jobs, function($job) use ($id){
        return $job['id'] == $id;
    });
    */

    $job = Job::find($id);


    return view('job', ['job' => $job]);
});
