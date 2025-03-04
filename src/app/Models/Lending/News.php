<?php

namespace App\Models\Lending;

use App\Models\NewsPreview;
use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, HasFilter;

    protected $table = 'news';

    protected $fillable = [
        'text',
        'title',
        'preview_text',
    ];

    public function preview()
    {
        return $this->belongsTo(NewsPreview::class, 'news_preview_id', 'id');
    }
}
