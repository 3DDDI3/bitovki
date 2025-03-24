<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'description';

    protected $fillable = [
        'block_1_0_text',
        'block_1_1_image_path',
        'block_1_1_image_name',
        'block_1_2_image_path',
        'block_1_2_image_name',
        'block_2_0_text',
        'block_2_1_image_path',
        'block_2_1_image_name',
        'block_2_2_image_path',
        'block_2_2_image_name',
        'block_2_3_image_path',
        'block_2_3_image_name',
        'block_3_0_text',
        'block_3_1_image_path',
        'block_3_1_image_name',
        'block_4_0_text',
        'block_4_1_image_path',
        'block_4_1_image_name',
        'block_5_0_text',
        'block_5_1_image_path',
        'block_5_1_image_name',
        'block_6_0_text',
        'block_6_1_image_path',
        'block_6_1_image_name',
        'block_6_2_image_path',
        'block_6_2_image_name',
        'block_7_0_text',
        'block_7_1_image_path',
        'block_7_1_image_name',
        'block_8_0_text',
        'block_8_1_image_path',
        'block_8_1_image_name',
        'block_9_0_text',
        'block_9_1_image_path',
        'block_9_1_image_name'
    ];
}
