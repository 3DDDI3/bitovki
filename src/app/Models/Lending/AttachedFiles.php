<?php

namespace App\Models\Lending;

use App\Models\Services\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachedFiles extends Model
{
    use HasFactory;

    protected $table = "attached_files";

    protected $fillable = [
        'page_id',
        'file_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
