<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use App\{User, Thread, Feed};

class UserProfileController extends Controller
{
    public function index(User $user) {   
        $threads = Thread::where('user_id', $user->id)->latest()->get();
        $comments = Comment::where('user_id', $user->id)->where('commentable_type', 'App\Thread')->get();
        $feeds = $user->feeds;
        // dd($feeds);

        return view('profile.index', compact('feeds', 'threads', 'comments', 'user'));
    }
}
