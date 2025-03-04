<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    use HasFactory;

    protected $table = "main_page";

    protected $fillable = [
        'title_1',
        'title_2',
        'title_3',
        'text_1',
        'text_2',
        'text_3',
        'video',
        'video_embeded',
    ];
}
