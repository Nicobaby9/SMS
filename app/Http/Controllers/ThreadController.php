<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use App\Thread;
use App\Model\Tag;
use Illuminate\Support\Facades\DB;

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
        if($request->has('tags')) {
            $tag = Tag::where('name', $request->tags)->first();
            $threads = $tag->threads;
        }else {
            $threads = Thread::paginate(15);
        }

        return view('thread.index', compact('threads'));
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
            'thread' => 'required|min:10',
            'tags' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $thread = auth()->user()->threads()->create($request->all());
        $thread->tags()->attach($request->tags);

        // $thread = Thread::create([
        //     'subject' => $request['subject'],
        //     'thread' => $request['thread'],
        //     'type' => $request['type'],
        // ]);

        // dd($thread);

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
        $thread = Thread::where('id', $thread)->first();

        // dd($thread);

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
        $thread = Thread::where('id', $thread)->first();
        $tag_thread = DB::table('tag_thread')->where('thread_id', $thread->id)->get();
        // $tags = Tag::where('id', $tag_thread->tag_id)->first();
        // $taz = DB::table('tag_thread')->find($tag_thread[0]);
        // $tagx = Tag::where('id', DB::table('tag_thread')->select('tag_id'));
        // $tagz = DB::table('tag_thread')->where('thread_id', $thread->id)->first();
        // $taz = $tagx->threads();

        // dd($tag_thread->);         

        // foreach($tag_thread as $a) {
        //     dd($a);
        // }

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
        $thread = Thread::where('id', $thread)->first();

        $this->authorize('update', $thread);

        $this->validate($request, [
            'subject' => 'required|min:1',
            'thread' => 'required|min:10',
            'tags' => 'required',
        ]);


        $thread->update([
            'subject' => $request['subject'],
            'thread' => $request['thread'],
            'tags' => $request['tags'],
        ]);

        return redirect()->route('forum.show', $thread)->withMessage('Berhasil Mengupdate Postingan');
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
        // dd($request->all());
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
