<?php

namespace App\Models\Lending;

use App\Models\Gallery;
use App\Models\Services\Infografika;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $table = "pages";

    protected $fillable = [
        'title',
        'text',
        'about_text_1',
        'about_text_2',
        'definition',
    ];

    public function attachedPage()
    {
        return $this->hasMany(AttachedPage::class)->first();
    }

    public function attachedPages()
    {
        return $this->hasMany(AttachedPage::class);
    }

    public function infografika()
    {
        return $this->belongsTo(Infografika::class, ownerKey: "about_id", foreignKey: "id");
    }

    public function attachedFiles(): HasMany
    {
        return $this->hasMany(AttachedFiles::class, 'page_id', 'id');
    }
}
