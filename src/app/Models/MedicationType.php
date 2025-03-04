<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationType extends Model
{
    use HasFactory;

    protected $table = "medication_type";

    protected $fillable = [
        'type',
        'path',
        'name',
        'hide',
        'rating',
    ];
}
