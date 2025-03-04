<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailler extends Model
{
    use HasFactory;

    protected $table = 'mailling';

    protected $fillable = [
        'email',
        'isAgent',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d.m.Y')
        );
    }
}
