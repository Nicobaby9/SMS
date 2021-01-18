<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\{Category, User};
use App\Traits\{CommentableTrait};

class Article extends Model
{
    use CommentableTrait;

    protected $fillable = ['title', 'content', 'user_id', 'image', 'slug'];

    public function categories() {
    	return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
    	return 'slug';
    }

}
