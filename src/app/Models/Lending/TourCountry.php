<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TourCountry extends Model
{
    use HasFactory;

    protected $table = "tour_country";

    public $fillable = [
        'tour_id',
        'country_id'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
