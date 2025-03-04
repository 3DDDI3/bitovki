<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationFile extends Model
{
    use HasFactory;

    protected $table = "medication_files";

    protected $fillable = [
        'medication_id',
        'name',
        'path',
        'hide',
        'rating'
    ];
}
