<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';

    public $fillable = [
        'name',
        'phone',
        'email',
        'text',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i d.m.Y')
        );
    }
}
