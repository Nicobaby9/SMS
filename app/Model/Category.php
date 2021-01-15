<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
{
    protected $fillable = ['name' , 'slug'];

    public function articles() {
    	return $this->belongsToMany(Article::class)->withTimestamps();
    }

    public function getRouteKeyName() {
    	return 'name';
    }
}
