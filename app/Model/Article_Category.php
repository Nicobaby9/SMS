<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article_Category extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName() {
        return 'name';
    }
}
