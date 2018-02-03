<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    /**
     * Get the comments for the blog post.
     */
    protected $fillable = [
        'id', 'site_id', 'date_visit'
    ];

    public static function getVisitorByMonth($id_site)
    {
        $currentMonth = date('m');

        return Visitor::whereRaw('MONTH(date_visit) = '. $currentMonth .' and site_id = '. $id_site)->count();

    }
}
