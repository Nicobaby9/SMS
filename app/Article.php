<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\User;

class Article extends Model
{
    use Traits\CommentableTrait;

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
