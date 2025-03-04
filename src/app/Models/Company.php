<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "company";

    protected $fillable = [
        'company_contact_id',
        'company_address_id',
        'inn',
        'kpp',
        'ogrn',
        'okpo',
        'requisites_path',
        'requisites_name',
    ];

    public function address()
    {
        return $this->belongsTo(CompanyAddress::class, 'company_address_id', 'id');
    }
}
