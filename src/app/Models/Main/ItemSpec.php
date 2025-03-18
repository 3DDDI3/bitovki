<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSpec extends Model
{
    use HasFactory;

    protected $table = 'specs';

    protected $fillable = [
        'living_area',
        'area',
        'building_area',
        'length',
        'sizes',
    ];
}
