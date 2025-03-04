<?php

namespace App\Models\Constructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockImage extends Model
{
    use HasFactory;

    protected $table = 'block_images';

    protected $fillable = [
        'path',
        'name',
        'block_id',
        'hide',
        'rating',
    ];
}
