<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
    use HasFactory;

    protected $table = 'infographics';

    protected $fillable = [
        'title',
        'image_path',
        'image_name',
    ];
}
