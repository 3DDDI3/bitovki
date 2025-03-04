<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = "cards";

    protected $fillable = [
        'path',
        'name',
        'title',
        'text',
    ];

    public function items()
    {
        return $this->hasMany(CardItem::class);
    }
}
