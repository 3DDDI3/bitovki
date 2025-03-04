<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";

    protected $fillable = [
        'id',
        'name',
        'icon',
        'image',
    ];

    public function tours()
    {
        return $this->hasMany(TourCountry::class);
    }
}
