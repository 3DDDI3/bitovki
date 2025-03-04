<?php

namespace App\Models\Constructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockFile extends Model
{
    use HasFactory;

    protected $table = 'block_files';

    protected $fillable = [
        'block_id',
        'path',
        'name',
        'hide',
        'rating',
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
