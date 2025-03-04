<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    use HasFactory;

    protected $table = "company_contacts";

    protected $fillable = [
        'title',
        'phone',
        'phone_description',
        'email',
        'name',
        'hide',
        'rating',
    ];
}
