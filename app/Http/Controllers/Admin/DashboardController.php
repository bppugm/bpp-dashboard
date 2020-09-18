<?php

namespace App\Http\Controllers\Admin;

use App\Achievement;
use App\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $dashboards = Dashboard::latest()->paginate();

        return view('admin.dashboard.index', compact('dashboards'));
    }

    public function store(Request $request)
    {
        
    }

    public function show(Request $request, Dashboard $dashboard)
    {
        $achievements = Achievement::get();
        
        return view('admin.dashboard.show', compact('dashboard', 'achievements'));
    }

    public function update(Dashboard $dashboard, Request $request)
    {
        $data = $request->validate([
            'name' => 'string|min:5|max:20',
            'widgets' => 'nullable'
        ]);
        
        $dashboard->update([
            'widgets' => json_encode($request->widgets)
        ]);

        return $dashboard->fresh();
    }
}
