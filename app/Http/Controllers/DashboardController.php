<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Achievement::getData();

        return view('home', compact('data'));
    }
}
