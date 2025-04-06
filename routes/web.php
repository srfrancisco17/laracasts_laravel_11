<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->paginate(10);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function (){
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function (){

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => '1',
    ]);

    return redirect('/jobs');

});

Route::get('/jobs/{id}/edit', function ($id){
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

//Update
Route::patch('/jobs/{id}/edit', function ($id){

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    $job = Job::findOrFail($id); //null

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/'.$job->id);

});

//Destroy
Route::delete('/jobs/{id}', function ($id){
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
