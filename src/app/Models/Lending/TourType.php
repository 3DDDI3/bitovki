<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourType extends Model
{
    use HasFactory;

    protected $table = "tour_type";

    protected $fillable = [
        'tour_type_id',
        'tour_id',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function tourType(): BelongsTo
    {
        return $this->belongsTo(TourTypes::class);
    }
}
