<?php

namespace App\Http\Filter\V1;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Filter
{
    public function relation(Builder $builder,$value,array $relation): Builder
    {

        return $value
            ? $builder->with($relation)
            : $builder;
    }

    public function search(Builder $builder,$value,$columns): Builder
    {
        if ($value) {
            foreach ($columns as $column) {
                $builder->orWhere($column, 'LIKE', "%$value%");
            }
        }
        return $builder;
    }

    public function all(Builder $builder, $value,$query): Collection|LengthAwarePaginator|array
    {
        return $value
            ? $builder->get()
            : $builder->paginate()->appends($query);
    }
}
