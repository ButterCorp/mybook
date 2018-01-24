<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'user_id', 'site_url', 'statut',
    ];
}
