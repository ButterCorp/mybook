<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'user_id', 'site_url', 'statut', 'slug_statut', 'slug', 'title_statut', 'title', 'footer_statut', 'footer_content', 'template_selectionned'
    ];
}
