<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Achievement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Achievement::all();

        return view('home.index', compact('data'));
    }

    public function show(Dashboard $dashboard)
    {
        $achievements = Achievement::all();
        
        return view('home.show', compact('dashboard', 'achievements'));
    }
}
