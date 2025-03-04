<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourStatus extends Model
{
    use HasFactory;

    protected $table = "tour_status";

    protected $fillable = [
        'tour_id',
        'status_id',
    ];

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function tour(): Tour
    {
        return $this->belongsTo(Tour::class)->first();
    }
}
