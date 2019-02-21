<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\FailedJob;
use App\Repositories\ScheduledUpdatesRepository;
use Illuminate\Http\Request;

class ScheduledUpdateController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $achievements = Achievement::where('automated', true)->get();
        $jobs = FailedJob::orderBy('failed_at', 'desc')->get();
        
        return view('dashboard.scheduled', compact('achievements', 'jobs'));
    }

    public function update(ScheduledUpdatesRepository $repo)
    {
        $response = $repo->update();

        return $response;
    }

    public function clear()
    {
        FailedJob::truncate();

        return redirect()->route('scheduled.index');
    }
}
