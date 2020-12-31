<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Comment, Like};

class LikeController extends Controller
{
    public function toggleLike(Request $request) {
    	$commentId = $request->get('commentId');
    	$comment = Comment::findOrFail($commentId);

    	$userLike = $comment->likes()->where('user_id', auth()->id())->where('likeable_id', $commentId)->first();
    	$isLiked = (bool)$comment->likes()->where('user_id', auth()->id())->count();

 		if(!$isLiked) {
	    	$like = new Like(); 
	    	$like->user_id = auth()->user()->id;
	    	$comment->likes()->save($like);

    		return response()->json(['status' => 'success', 'message' => 'liked']);
 		}else {
 			$comment->likes()->where('user_id', auth()->id())->delete();

			return response()->json(['status' => 'success', 'message' => 'unliked']);
 		}

    }
}
