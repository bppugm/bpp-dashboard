<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\FailedJob;
use Illuminate\Http\Request;

class ScheduledUpdateController extends Controller
{
    public function index()
    {
        $data = Achievement::getData();
        $jobs = FailedJob::all();

        // return $jobs;
        
        return view('dashboard.scheduled', compact('data', 'jobs'));
    }

    public function clear()
    {
        FailedJob::truncate();

        return redirect()->route('scheduled.index');
    }
}
