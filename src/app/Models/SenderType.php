<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderType extends Model
{
    use HasFactory;

    protected $table = 'sender_type';

    protected $fillable = [
        'type',
        'type_alt'
    ];
}
