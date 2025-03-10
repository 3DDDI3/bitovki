<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use HasFactory;

    protected $table = 'our_works';

    
    protected $fillable = [
        'image_path',
    ];
}
