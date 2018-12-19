<?php

namespace App\Filters\Privilege;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class User implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->whereHas('user', function ($builder) use ($value) {
            $builder->where('name', 'like', $value);
        });
    }
}
