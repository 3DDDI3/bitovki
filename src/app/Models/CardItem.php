<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardItem extends Model
{
    use HasFactory;

    protected $table = "card_items";

    protected $fillable = [
        'card_id',
        'text',
    ];
}
