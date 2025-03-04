<?php

namespace App\Models\Constructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Block extends Model
{
    use HasFactory;

    protected $table = "blocks";

    protected $fillable = [
        'block_type_id',
        'page_id',
        'text',
        'name',
        'block_order',
        'hide',
        'rating',
    ];

    public function blockFiles(): HasMany
    {
        return $this->hasMany(BlockFile::class)->orderBy('rating', 'desc');
    }

    public function personal(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, BlockPerson::class);
    }

    public function blockPerson(): HasMany
    {
        return $this->hasMany(BlockPerson::class);
    }

    public function menu(): HasMany
    {
        return $this->hasMany(BlockMenu::class);
    }
}
