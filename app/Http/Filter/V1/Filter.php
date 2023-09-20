<?php

namespace App\Http\Filter\V1;

class Filter
{
    public function search($builder,$value,$column)
    {
        return $value
            ? $builder->where($column, 'LIKE', "%$value%")
            : $builder;
    }

    public function all($builder, $value,$query)
    {
        return $value
            ? $builder->get()
            : $builder->paginate()->appends($query);
    }

    public function relation($builder,$value,array $relation)
    {

        return $value
            ? $builder->with($relation)
            : $builder;
    }
}
