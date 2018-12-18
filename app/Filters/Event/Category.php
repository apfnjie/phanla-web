<?php

namespace App\Filters\Event;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Category implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->whereHas('categories', function ($builder) use ($value) {
            $builder->where('name', 'like', $value);
        });
    }
}
