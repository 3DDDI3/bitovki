<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourTypes extends Model
{
    use HasFactory;

    protected $table = "tour_types";

    protected $fillable = [
        'type',
    ];

    public function tours()
    {
        return $this->hasMany(TourType::class, 'tour_type_id', 'id');
    }
}
