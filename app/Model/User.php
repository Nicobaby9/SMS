<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password', 'phone', 'google_id', 'username', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function threads() {
        return $this->hasMany(Thread::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getRouteKeyName() {
        return 'username';
    }

    public function feeds() {
        return $this->hasMany(Feed::class);
    }

    public function gallery() {
        return $this->hasMany(Gallery::class);
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
