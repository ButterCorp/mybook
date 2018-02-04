<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * Get the comments for the blog post.
     */
    protected $fillable = [
        'id', 'name', 'email','facebook','remeber_token',
    ];
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    protected $hidden = [
        'remember_token',
    ];
}
