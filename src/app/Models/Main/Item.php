<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'title',
        'subtitle',
        'old_price',
        'new_price',
        'monthly payment',
        'month_count',
        'image_path',
        'image_name',
    ];

    public function attachedImages(): HasMany
    {
        return $this->hasMany(ItemAttachedImage::class);
    }

    public function specs(): HasOne
    {
        return $this->hasOne(ItemSpec::class);
    }
}
