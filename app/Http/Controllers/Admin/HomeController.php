<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{Thread, Article, Frontend, User, Book, Student};

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
        $all_user = User::all();
        $books = Book::all();
        $students = Student::all();

        return view('admin.dashboard', compact('threads', 'articles', 'latest_thread', 'all_user', 'books', 'students'));
    }
}
