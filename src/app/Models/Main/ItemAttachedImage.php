<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAttachedImage extends Model
{
    use HasFactory;

    protected $item = 'item_attached_images';

    protected $fillable = [
        'image_path',
        'image_name',
        'rating',
    ];
}
