<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Achievement::latest()->first();

        return view('home', compact('data'));
    }

    public function update(Request $request)
    {
        $data = Achievement::latest()->first();

        $data->update($request->all());

        return redirect()->route('home')->with('status', 'Update data success');
    }
}
