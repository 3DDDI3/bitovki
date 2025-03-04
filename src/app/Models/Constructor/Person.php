<?php

namespace App\Models\Constructor;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = "persons";

    protected $fillable = [
        'name',
        'path',
        'specialty_id',
        'hide',
        'reating',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
