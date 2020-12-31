<?

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Model\{Comment, Like};

trait CommentableTrait {
	
	public function addComment($body) {
		$comment = new Comment;
        $comment->body = $body;
        $comment->user_id = auth()->user()->id;
        $this->comments()->save($comment);

        return $comment;
	}

    public function comments() {
    	return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function likes() {
    	return $this->morphMany(Like::class, 'likeable');
    }

    public function likeIt() {
    	$like = new Like(); 
    	$like->user_id = auth()->user()->id;
    	$this->likes()->save($like);

    	return $like;
    }

    public function unlikeIt() {
    	$like = $this->likes()->where('user_id', auth()->id()->delete();
    }

    public function isLiked() {
    	return !!$this->likes()->where('user_id', auth()->id())->count();
    }
}