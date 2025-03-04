<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = "personal";

    protected $fillable = [
        'name',
        'description',
        'email',
    ];
}
