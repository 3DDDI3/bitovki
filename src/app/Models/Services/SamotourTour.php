<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SamotourTour extends Model
{
    use HasFactory;

    protected $table = "samotour_tours";

    protected $fillable = [
        'id_tour',
        'id_city',
        'id_country',
        'name',
    ];
}
