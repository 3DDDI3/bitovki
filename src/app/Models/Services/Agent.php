<?php

namespace App\Models\Services;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = "agents";

    protected $fillable = [
        'name',
        'phone',
        'address',
        'url',
        'logo',
        'user_id',
        'isActive',
        'isConfirmed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
