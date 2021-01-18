<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) { 
        if($request->has('search')) {
            $search = $request['search'];
     
            $threadz = Thread::where('subject','like',"%".$search."%")->paginate(10);
        }else {
            $threads = Thread::paginate(15);
        }
 
        return view('thread.partial.search',compact('threadz'));
    }
}
