<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationReseach extends Model
{
    use HasFactory;

    protected $table = "medication_researches";

    protected $fillable = [
        'phase',
        'description',
        'medication_id',
        'hide',
        'rating'
    ];
}
