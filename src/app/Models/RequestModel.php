<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;

    protected $table = "requests";

    protected $fillable = [
        'pacient',
        'gender_id',
        'isChild',
        'sender_type_id',
        'age',
        'diagnosis',
        'pregnancy',
        'pregnancy_duration',
        'sender',
        'communication_method',
        'medication',
        'series',
        'dosing',
        'indication',
        'treatment_beginning',
        'treatment_ending',
        'reaction_beginning',
        'reaction_ending',
        'reaction_description',
        'actions',
        'therapy',
        'other_medication',
        'treatment_course',
        'other'
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function senders()
    {
        return $this->hasOne(SenderType::class, 'id', 'sender_type_id');
    }
}
