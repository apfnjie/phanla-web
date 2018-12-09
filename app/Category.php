<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function events()
    {
        return $this->belongsToMany('App\Event', 'category_events', 'category_id', 'event_tag');
    }
}
