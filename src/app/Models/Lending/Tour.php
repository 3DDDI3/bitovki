<?php

namespace App\Models\Lending;

use App\Models\Gallery;
use App\Models\Services\Infografika;
use App\Models\Services\SamotourTour;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $casts = [
        'created_at' => 'datetime:H:i d.m.Y',
    ];

    public function country()
    {
        // return $this->hasOne(TourCountry::class);
        return $this->hasOneThrough(Country::class, TourCountry::class, 'tour_id', 'id', 'id', 'country_id');
    }

    public function tours(): HasMany
    {
        return $this->hasMany(TourCountry::class);
    }

    public function infografika(): HasMany
    {
        return $this->hasMany(Infografika::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Programs::class);
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class, "item_id", "id")->where(['item_type' => 'tour']);
    }

    public function tourType(): HasMany
    {
        return $this->hasMany(TourType::class);
    }

    public function tourTypes(): Collection
    {
        return Country::query()->where(['hide' => 0])->orderBy('id')->get();
    }

    public function samotourTour()
    {
        return $this->belongsTo(SamotourTour::class);
    }

    public function tourStatus()
    {
        return $this->hasManyThrough(Status::class, TourStatus::class, 'tour_id', 'id', 'id', 'status_id');
    }

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'description',
        'preview_title',
        'preview_header',
        'preview_text',
        'preview_price',
        'preview_nights',
        'tour_cost_info',
        'tour_additional_cost',
        'agreement_info',
        'background_image',
        'isHiddenTouristInfo',
        'isHiddenCountryInfo',
        'isHiddenTourCost',
        'path1',
        'path2',
    ];
}
