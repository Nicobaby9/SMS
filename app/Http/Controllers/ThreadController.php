<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;


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
    public function index()
    {
        $threads = Thread::paginate(15);

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
            'subject' => 'required|min:10',
            'thread' => 'required|min:10',
            'type' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        auth()->user()->threads()->create($request->all());

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
    public function edit($thread)
    {
        $thread = Thread::where('id', $thread)->first();

        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $thread)
    {
        $thread = Thread::where('id', $thread)->first();

        if (auth()->user()->id !== $thread->user_id) {
            abort(401, "Unauthorized");
        }

        $this->validate($request, [
            'subject' => 'required|min:10',
            'thread' => 'required|min:10',
            'type' => 'required',
        ]);

        // $thread->update($request->all());
        $thread->update([
            'subject' => $request['subject'],
            'thread' => $request['thread'],
            'type' => $request['type'],
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
        if (auth()->user()->id !== $thread->user_id) {
            abort(401, message('Unauthorized'));
        }

        Thread::where('id', $thread)->delete();

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
