<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'url', 'album_id', 'nb_likes', 'nb_comments', 'description',
    ];
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
