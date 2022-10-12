<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropCategory extends Model
{
    use HasFactory;
    protected $table = 'crop_categories';
    protected $fillable = [
        'name', 'description',
    ];
}
