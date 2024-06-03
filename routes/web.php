<?php

// namespace App\Http\Controllers;

use App\Http\Controllers\JobController;
// use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
// use App\Models\job;

// Route::get('/', function () {
//     return view('home');
// });
Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');





///////////// NEW WAY USING CONTROLLER  /////////
####jobController

##index
// Route::get('/jobs', [JobController::class, 'index']);
// Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

##create
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

##show
Route::get('/jobs/{job}', [JobController::class, 'show']);

##store
Route::post('/jobs', [JobController::class, 'store']);

##edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

##update
Route::get('/jobs/{job}', [JobController::class, 'update']);

##destroy
Route::get('/jobs/{job}', [JobController::class, 'destroy']);


////////////   OLD WAY   //////////

Route::get('/jobs', function () {

    return view('jobs.index' , [
        'jobs' => Job::orderBy('created_at', 'desc')->paginate(6)
        ###types of pagination

        // *simplePaginate
        // *cursorPaginate

        //  job::all()
        ]);
});

// $jobs = job::with('employer')->paginate(3);

    // return view('jobs', [
    //     'jobs' => $jobs
    // ]);

// Route::get('jobs/create', function () {
//     return view('jobs.create');

// });

// Route::get('/jobs/{job}', function ( job $job) {
//         // $job = job::find($id);

//         return view('jobs.show', ['job' => $job]);
// });


// Route::Post('/jobs', function () {
//     // dd('you just there');
//     // validate
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     job::create([
//         'title' => request('title'),
//         'salary' => request('salary'),
//         'employer_id' => 1
//     ]);

//     return redirect('/jobs');

// });


// Route::get('/jobs/{id}/edit', function ($id) {
//     $job = job::find($id);

//     return view('jobs.edit', ['job' => $job]);
// });

// Route::get('/jobs/{job}/edit', function ( job $job) {
//     // $job = job::find($id);

//     return view('jobs.edit', ['job' => $job]);
// });


// Route::patch('/jobs/{job}', function ( job $job) {
//     // validate
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     // authorize (on hold..)

//     // update the job
//     // $job = Job::findOrFail($id);

//     // and persist
//     $job->update([
//         'title' => request('title'),
//         'salary' => request('salary')
//     ]);

//     // redirect to the job page
//     return redirect('/jobs/' . $job->id);
// });

// Destroy
// Route::delete('/jobs/{job}', function ( job $job) {
//     // Authorize (on hold....)

//     // Delete the job
//     // $job = job::findOrFail($id);
//     $job->delete();

//     // Redirect
//     return redirect ('/jobs');
// });
