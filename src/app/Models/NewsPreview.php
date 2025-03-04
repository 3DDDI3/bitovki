<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NewsPreview extends Model
{
    use HasFactory;

    protected $table = "preview_news";

    protected $fillable = [
        'title',
        'description',
        'name',
        'path',
    ];

    public function news(): HasOne
    {
        return $this->hasOne(News::class);
    }
}
