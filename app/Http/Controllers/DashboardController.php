<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Achievement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();
        $dashboard = Dashboard::where('is_active', true)->first();

        return view('home.show', compact('achievements', 'dashboard'));
    }

    public function show(Dashboard $dashboard)
    {
        $achievements = Achievement::all();
        
        return view('home.show', compact('dashboard', 'achievements'));
    }
}
