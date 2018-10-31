<?php

namespace App\Filters;

use App\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EventFilter
{
    public static function apply(Request $filters)
    {
        $query = static::applyDecoratorsFromRequest(
            $filters, (new Event)->newQuery()
        );

        return static::getResults($filters, $query);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        $searchParameters = array_filter($request->all());

        foreach ($searchParameters as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);
            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }

        return $query;
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Event\\' .
        str_replace(' ', '', ucwords(
            str_replace('_', ' ', $name)
        ));
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function getResults(Request $filters, Builder $query)
    {
        return ($filters->exists('all')) ? $query->get() : $query->paginate(10);
    }
}
