<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Achievement::latest()->first();

        return view('dashboard.index', compact('data'));
    }
}
