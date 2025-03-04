<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_type_id',
        'fio',
        'phone',
        'address',
        'email',
        'text',
        'mediaction_title',
        'dosing',
        'seria',
        'created_at',
    ];

    public function senders()
    {
        return $this->hasOne(SenderType::class, 'id', 'sender_type_id');
    }
}
