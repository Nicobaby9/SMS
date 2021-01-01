<?php 
namespace App\Traits;

use App\Model\Like;


trait LikeableTrait
{

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function likeIt()
    {
        $like = new Like();
        $like->user_id = auth()->user()->id;

        $this->likes()->save($like);

        return $like;
    }

    public function unlikeIt()
    {
		// $like = Like::find($id);
        return $this->likes()->where('user_id',auth()->id())->delete();
    }

    public function isLiked()
    {
        return !!$this->likes()->where('user_id',auth()->id())->count();
    }

}