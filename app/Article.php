<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\User;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'image', 'category_id', 'slug'];

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
    	return 'slug';
    }
}
