<?php

namespace App\Http\Controllers;

use App\Model\{Comment, Tag, Thread};
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ThreadController extends Controller
{
    function __construct() {
        return $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag_thread = Tag::withCount('threads')->get();
        $threads = Thread::orderBy('created_at', 'Desc')->get();

        return view('thread.index', compact('threads', 'tag_thread'));
    }

    public function categoryThread($tag) {
        $tag = Tag::where('name', $tag)->first();
        $threads = Thread::orderBy('created_at', 'Desc')->get();

        $threads = $tag->threads;

        return view('thread.index', compact('threads', 'tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|min:1',
            'slug' => 'unique:threads',
            'thread' => 'required|min:10',
            'tags' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $thread = Thread::create([
            'subject' => $request['subject'],
            'thread' => $request['thread'],
            'slug' => Str::random(3).Carbon::now()->Format('s').'-'.\Str::slug($request->subject, '-'),
            'user_id' => auth()->user()->id,
        ]);

        $thread->tags()->attach($request->tags);

        return redirect('/forum')->withMessage('Berhasil Mmebuat Postingan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($thread)
    {
        $thread = Thread::where('slug', $thread)->first();

        return view('thread.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($thread, Request $request)
    {
        $thread = Thread::where('slug', $thread)->first();
        $tag_thread = DB::table('tag_thread')->where('thread_id', $thread->id)->get();

        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$thread)
    {
        $this->validate($request, [
            'subject' => 'required|min:1',
            'thread' => 'required|min:10',
            'slug' => 'unique:threads',
        ]);

        $thread = Thread::where('slug', $thread)->first();

        $this->authorize('update', $thread);

        $thread->update([
            'subject' => $request['subject'],
            'thread' => $request['thread'],
        ]);

        $thread->tags()->sync($request->tags);

        return redirect()->route('thread.show', $thread)->withMessage('Berhasil Mengupdate Postingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($thread)
    {
        $thread = Thread::where('id', $thread)->first();
        $comment = Comment::where('commentable_id', $thread->id);
        $tags = DB::table('tag_thread')->where('thread_id', $thread->id);
        $this->authorize('update', $thread);

        $tags->delete();
        $comment->delete();
        $thread->delete();

        return redirect('/forum')->withMessage('Post Berhasil Didelete.');
    }

    public function markAsSolution(Request $request) {
        $solutionId = $request->get('solutionId');
        $threadId = $request->get('threadId');
        $thread = Thread::findOrFail($threadId);
        $thread->solution = $solutionId;

        if($thread->save()) {
            if(request()->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'Berhasil Memilih Jawaban']);
            }
            return redirect()->back()->withMessage('Berhasil Memilih Jawaban');
        }
    }
}
