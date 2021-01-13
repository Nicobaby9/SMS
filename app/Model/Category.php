<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
{
    protected $fillable = ['name' , 'slug'];

    public function articles() {
    	return $this->hasMany(Article::class);
    }

    public function getRouteKeyName() {
    	return 'name';
    }
}
