<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Comment, Like};

class LikeController extends Controller
{
    public function toggleLike() {
    	$commentId = request()->get('commentId');
    	$comment = Comment::findOrFail($commentId);

    	// $userLike = $comment->likes()->where('user_id', auth()->id())->where('likeable_id', $commentId)->first();

 		if(!$comment->isLiked()){
            $comment->likeIt();
            return response()->json(['status'=>'success','message'=>'liked']);

        }else{
            $comment->unlikeIt();
            return response()->json(['status'=>'success','message'=>'unliked']);
        }

    }
}
