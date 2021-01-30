<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Comment, Like};

class LikeController extends Controller
{
    public function toggleLike() {
    	$commentId = request()->get('commentId');
    	$comment = Comment::findOrFail($commentId);

 		if(!$comment->isLiked()){
            $comment->likeIt();
            Comment::where('id', $commentId)->increment('likes_count');

            return response()->json(['status'=>'success','message'=>'liked', 'comment' => $comment]);

        }else{
            $comment->unlikeIt();
            Comment::where('id', $commentId)->decrement('likes_count');
            return response()->json(['status'=>'success','message'=>'unliked']);
        }

        broadcast(new CommenAction($id, $action))->toOthers();

    }
}
