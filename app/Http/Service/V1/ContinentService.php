<?php

namespace App\Http\Service\V1;

use App\Http\Service\Service;

class ContinentService extends Service
{
    public const SEARCH_COLUMN = 'name';

    protected array $filters = ['relation', 'search', 'all'];

    protected array $relation = ['countries'];

    protected function getSearchColumn(): string
    {
        return self::SEARCH_COLUMN;
    }
}
