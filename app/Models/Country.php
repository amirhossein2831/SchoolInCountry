<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    use HasFactory;

    public $guarded = [];
    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }

    protected static function boot(): void
    {
        parent::boot();
    }
}
