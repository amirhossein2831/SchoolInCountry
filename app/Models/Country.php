<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'capital',
        'language',
        'currency_name',
        'continent_id'
    ];

    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }

    protected static function boot(): void
    {
        parent::boot();
    }
}
