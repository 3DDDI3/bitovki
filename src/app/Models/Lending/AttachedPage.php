<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttachedPage extends Model
{
    use HasFactory;

    protected $table = "attached_pages";

    protected $fillable = [
        'page_id',
        'attached_page_id',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, foreignKey: "page_id");
    }

    public function attachedPage(): BelongsTo
    {
        return $this->belongsTo(Page::class, foreignKey: "attached_page_id");
    }
}
