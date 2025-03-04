<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationPreview extends Model
{
    use HasFactory;

    protected $table = "medication_preview";

    protected $fillable = [
        'medication_id',
        'title',
        'subtitle',
        'name',
        'path',
    ];

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
}
