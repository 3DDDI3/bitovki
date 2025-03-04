<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;

    protected $table = "company_addresses";

    protected $fillable = [
        'title',
        'address',
        'schema_path',
        'schema_name',
        'photo_path',
        'photo_name',
        'subtitle',
        'photo',
        'auto_text',
        'bus_text',
    ];
}
