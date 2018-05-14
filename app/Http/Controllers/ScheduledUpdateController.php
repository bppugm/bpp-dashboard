<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;

class ScheduledUpdateController extends Controller
{
    public function index()
    {
        $data = Achievement::getData();
        
        return view('dashboard.scheduled', compact('data'));
    }
}
