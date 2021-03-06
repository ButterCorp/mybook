<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Site extends Model
{
    protected $fillable = [
        'user_id', 'site_url', 'statut', 'is_active', 'slug_statut', 'slug', 'title_statut', 'title', 'footer_statut',
        'footer_content', 'template_selectionned', 'show_count_comments', 'show_photo_description', 'show_count_likes'
    ];
}