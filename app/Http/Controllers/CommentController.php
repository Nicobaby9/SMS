<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommentableTrait;
use App\Notifications\RepliedToThread;
use App\Model\{Thread, Article, Comment};

class CommentController extends Controller
{
    public function addArticleComments(Request $request, $slug) {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $article = Article::where('slug', $slug)->first();
        $article->addComment($request->body);

        return redirect()->back()->withMessage('Berhasil Menambahkan Komentar di artikel : '.$article->title);
    }

    public function addThreadComments(Request $request, Thread $thread) {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $thread->addComment($request->body);
        $thread->user->notify(new RepliedToThread($thread));

        return redirect()->back()->withMessage('Berhasil Menambahkan Komentar di postingan : '.$thread->subject);
    }

    public function addReplyComments(Request $request, Comment $comment) {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment->addComment($request->body);

        return redirect()->back()->withMessage('Berhasil Menambahkan Reply');
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
        if ($comment->user_id !== auth()->user()->id) {
            abort(401);
        }

        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment->update($request->all());

        return redirect()->back()->withMessage('Berhasil Mengedit Komentar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== auth()->user()->id) {
            abort(401);
        }
        $reply = Comment::where('commentable_id', $comment->id);

        $reply->delete();
        $comment->delete();

        return redirect()->back()->withMessage('Berhasil Menghapus Komentar');
    }
}
