<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'block_1_title',
        'block_1_subtitle',
        'block_1_price_title',
        'block_1_price_value',
        'block_1_image_path',
        'block_1_price_subtitle',
        'block_2_title',
        'block_2_subtitle',
        'block_2_text1',
        'block_2_text2',
        'block_2_image_path',
        'block_2_image_description',
        'block_3_title',
        'block_3_economy_title',
        'block_3_economy_value',
        'block_3_subtitle',
        'block_3_text',
        'block_3_image_path',
        'block_3_1_title',
        'block_3_1_economy_title',
        'block_3_1_economy_value',
        'block_3_1_subtitle',
        'block_3_1_text',
        'block_3_1_image_path',
        'block_4_title',
        'block_4_text',
        'block_4_image1_path',
        'block_4_image1_description',
        'block_4_image2_path',
        'block_4_image2_description',
        'block_5_title',
        'block_5_text',
    ];
}
