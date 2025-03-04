<?php

namespace App\Models\Constructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockMenu extends Model
{
    use HasFactory;

    protected $table = "block_menus";

    protected $fillable = [
        'block_id',
        'title',
        'url',
        'hide',
        'rating'
    ];
}
