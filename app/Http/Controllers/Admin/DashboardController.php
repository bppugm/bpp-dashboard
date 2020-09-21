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
        $data = $request->validate([
            'name' => 'required|string|max:30|min:3',
            'description' => 'nullable|string|max:100|min:3'
        ]);

        $dashboard = Dashboard::create($data);

        return $dashboard;
    }

    public function show(Request $request, Dashboard $dashboard)
    {
        $achievements = Achievement::get();
        
        return view('admin.dashboard.show', compact('dashboard', 'achievements'));
    }

    public function update(Dashboard $dashboard, Request $request)
    {
        $data = $request->validate([
            'name' => 'string|min:3|max:30',
            'description' => 'nullable|string|max:100|min:3',
            'widgets' => 'nullable|array'
        ]);
        
        $dashboard->update($data);

        return $dashboard->fresh();
    }

    public function activate(Dashboard $dashboard)
    {
        Dashboard::where('is_active', true)->update(['is_active' => false]);
        $dashboard->update(['is_active' => true]);

        return $dashboard;
    }

    public function destroy(Dashboard $dashboard)
    {
        $dashboard->delete();

        return response(null, 204);
    }
}
