<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory, HasFilter;

    protected $table = "news";

    protected $fillable = [
        'text',
        'news_preview_id',
        'main_news',
        'created_at',
    ];

    public function preview(): HasOne
    {
        return $this->hasOne(NewsPreview::class, 'id', 'news_preview_id');
    }

    public function image()
    {
        return $this->hasOne(NewsImage::class);
    }
}
