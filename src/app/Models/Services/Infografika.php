<?php

namespace App\Models\Services;

use App\Models\Lending\Page;
use App\Models\Lending\Tour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Infografika extends Model
{
    use HasFactory;

    protected $table = "infografika";

    public $timestamps = false;

    protected $fillable = [
        'icon',
        'title',
        'text',
        'tour_id',
        'about_id',
        'subtitle',
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, ownerKey: "id", foreignKey: "about_id");
    }
}
