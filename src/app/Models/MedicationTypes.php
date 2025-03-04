<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationTypes extends Model
{
    use HasFactory;

    protected $table = "medication_types";

    protected $fillable = [
        'path',
        'title',
        'type',
        'name',
        'hide',
        'rating',
    ];
}
