<?php

namespace App\Http\Service\V1;

use App\Http\Service\Service;

class CountryService extends Service
{
    public const SEARCH_COLUMN = "name";

    protected array $filters = ['search', 'all'];

    protected function getSearchColumn(): string
    {
        return self::SEARCH_COLUMN;
    }
}
