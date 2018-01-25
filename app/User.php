<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Get the comments for the blog post.
     */
    protected $fillable = [
        'id', 'name', 'email','facebook'
    ];
    public function albums()
    {
        return $this->hasMany('App\Albums');
    }
}
