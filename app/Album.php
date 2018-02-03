<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'id','album_id', 'title', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
