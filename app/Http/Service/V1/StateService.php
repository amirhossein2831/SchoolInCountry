<?php

namespace App\Http\Service\V1;

use App\Http\Service\Service;

class StateService extends Service
{
    public const SEARCH_COLUMNS = ['name','governor'];

    protected array $filters = ['search', 'all'];

    protected array $relation = [];

    protected function getSearchColumn(): array
    {
        return self::SEARCH_COLUMNS;
    }
}
