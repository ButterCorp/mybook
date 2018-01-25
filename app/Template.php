<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
     * Get the comments for the blog post.
     */
    protected $fillable = [
        'id', 'template_name', 'statut'
    ];

}
