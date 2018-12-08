<?php

namespace App\Filters\Event;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Status implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('status', $value);
    }
}
