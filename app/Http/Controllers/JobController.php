<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
// use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;



class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index' , [
            'jobs' => Job::orderBy('created_at', 'desc')->paginate(6)

            ]);
    }

    // ###types of pagination

    //         // *simplePaginate
    //         // *cursorPaginate

            //  job::all()
    public function create()
    {
        return view('jobs.create');

    }

    public function show( job $job)
    {
        return view('jobs.show', ['job' => $job]);

    }

    public function store()
    {
// dd('you just there');
    // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        Mail::to('marvinmawira8@gmail.com')->queue(
            new \App\Mail\JobPosted()
        );

        return redirect('/jobs');
    }

    public function edit( job $job )
    {
        return view('jobs.edit', ['job' => $job]);

    }

    public function update(job $job)
    {
        // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        // authorize (on hold..)

        // update the job
        // $job = Job::findOrFail($id);

        // and persist
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        // redirect to the job page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(job $job)
    {
        // Authorize (on hold....)

        // Delete the job
        // $job = job::findOrFail($id);
        $job->delete();

        // Redirect
        return redirect ('/jobs');
    }
}

