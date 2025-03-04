<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Medication extends Model
{
    use HasFactory, HasFilter;

    protected $table = 'medications';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'instraction_short',
        'instraction_short_descripion',
        'researches_description',
        'researches_title',
        'instraction_name',
        'instraction_path',
        'description_name',
        'description_path',
        'indications',
        'volunteers_count',
        'patients_count',
        'patient_title',
        'subjects_count',
        'instraction_title',
        'phases_title',
        'reseaches_title',
        'patients_count_title',
        'phases_text',
        'path',
        'name',
    ];

    public function files(): HasMany
    {
        return $this->hasMany(MedicationFile::class);
    }

    public function type(): BelongsToMany
    {
        return $this->belongsToMany(MedicationTypes::class, MedicationType::class);
    }

    public function preview(): HasOne
    {
        return $this->hasOne(MedicationPreview::class);
    }

    public function researches(): HasMany
    {
        return $this->hasMany(MedicationReseach::class);
    }
}
