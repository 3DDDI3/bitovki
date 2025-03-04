<?php

namespace App\Models\Lending;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourFile extends Model
{
    use HasFactory;

    protected $table = "tour_attached_files";

    protected $fillable = [];
}
