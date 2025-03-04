<?php

namespace App\Models\Constructor;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'name',
        'url',
        'hide',
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class)
            ->where(['hide' => 0])
            ->orderBy('rating', 'desc');
    }

    public function block(): HasOne
    {
        return $this->hasOne(Block::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
