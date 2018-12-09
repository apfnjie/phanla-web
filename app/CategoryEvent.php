<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_tag', 'category_id'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event', 'event_tag', 'tag');
    }

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }
}
