<?php

namespace App\Http\Service\V1;

use App\Http\Service\Service;

class CountryService extends Service
{
    public const SEARCH_COLUMN = ['name'];

    protected array $filters = ['relation','search', 'all'];

    protected array $relation = ['states'];


    protected function getSearchColumn(): array
    {
        return self::SEARCH_COLUMN;
    }
}
