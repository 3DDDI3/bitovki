<?php

namespace App\Models\Constructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlockPerson extends Model
{
    use HasFactory;

    protected $table = "block_persons";

    protected $fillable = [
        'person_id',
        'block_id',
        'hide',
        'rating',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
