<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Frontend;
use App\{Thread, Article};

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $threads = Thread::paginate(15);
        $articles = Article::all();
        $latest_thread = Thread::orderBy('created_at', 'desc')->first();

        // dd($latest_article);

        return view('admin.dashboard', compact('threads', 'articles', 'latest_thread'));
    }
}
