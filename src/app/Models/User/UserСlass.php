<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserСlass extends Model
{
    protected $table = 'user_classes';

    public $fillable = [
        'name'
    ];

    public function rights()
    {
        return $this->hasMany(AdminAccessRights::class, 'user_class_id');
    }
}
