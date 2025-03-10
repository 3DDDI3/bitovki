<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalOption extends Model
{
    use HasFactory;

    protected $table = 'additional_options';

    protected $fillable = [
        'text',
        'image_path',
        'image_name'
    ];
}
