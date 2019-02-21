<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Jobs\UpdateScopusArticle;
use App\Repositories\ScopusRepository;
use Carbon\Carbon;
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
        $this->middleware('auth')->except('scopus');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::where('automated', false)->get();

        return view('dashboard.index', compact('achievements'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'data.*' => 'required|integer'
        ]);

        foreach ($request->data as $key => $value) {
            Achievement::where('name', $key)->first()->update(['value' => $value]);
        }
        
        return redirect()->route('home')->with('status', 'Update data success');
    }
}
