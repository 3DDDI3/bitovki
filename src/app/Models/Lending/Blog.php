<?php

namespace App\Models\Lending;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'text',
        'title',
        'preview_text',
        'preview_image',
        'image',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i d.m.Y')
        );
    }
}
