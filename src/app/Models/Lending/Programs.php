<?php

namespace App\Models\Lending;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Programs extends Model
{
    use HasFactory;

    protected $table = "tour_programs";

    public $timestams = false;

    protected $fillable = [
        'tour_id',
        'day',
        'text',
        'title'
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class, "id", "item_id")->where(['item_type' => 'programs']);
    }
}
