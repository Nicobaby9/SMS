<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use App\Thread;

class CommentController extends Controller
{

    public function addThreadComments(Request $request, Thread $thread) {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;

        $thread->comments()->save($comment);

        return redirect()->back()->with(['success' => 'Berhasil menambahkan komentar.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
