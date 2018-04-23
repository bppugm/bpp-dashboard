<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Jobs\UpdateScopusArticle;
use App\Repositories\ScopusRepository;
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
        $data = Achievement::getData();

        return view('home', compact('data'));
    }

    public function update(Request $request)
    {
        $data = Achievement::latest()->first();

        $data->update($request->all());

        return redirect()->route('home')->with('status', 'Update data success');
    }

    public function scopus()
    {
        // $repository = new ScopusRepository;
        // $data = $repository->search();

        // return $data;
        UpdateScopusArticle::dispatch();
    }
}
