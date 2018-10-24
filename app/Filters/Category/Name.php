<?php

namespace App\Filters\Category;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Name implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('name', 'like', "%$value")
            ->orWhere('name', 'like', "$value%");
    }
}
