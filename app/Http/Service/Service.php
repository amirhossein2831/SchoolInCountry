<?php

namespace App\Http\Service;

use App\Http\Filter\V1\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Service
{
    protected array $filters = [];
    protected array $relation = [];

    protected abstract function getSearchColumn();

    public function __construct(private Filter $filter){}

   
}
