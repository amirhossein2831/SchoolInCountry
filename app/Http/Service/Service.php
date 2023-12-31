<?php

namespace App\Http\Service;

use App\Http\Filter\V1\Filter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Service
{
    protected array $filters = [];
    protected array $relation = [];

    protected abstract function getSearchColumn();

    public function __construct(private Filter $filter){}

    public function applyFilter(Request $request, Builder $builder): Collection|LengthAwarePaginator|Builder|array
    {
        if (in_array('relation', $this->filters)) {
            $builder = $this->filter->relation($builder, $request->query('relation'),$this->relation);
        }
        if (in_array('search', $this->filters)) {
            $builder = $this->filter->search($builder, $request->query('q'), $this->getSearchColumn());
        }
        if (in_array('all', $this->filters)) {
            $builder = $this->filter->all($builder, $request->query('all'),$request->query());
        }
        return $builder;
    }

    public function singleRelation(Model $entity,$value, array|string $relation): Model
    {
        return $value
            ? $entity->loadMissing($relation)
            : $entity;
    }
}
