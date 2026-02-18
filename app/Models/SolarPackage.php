<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolarPackage extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'usage_description',
        'is_active'
    ];
}
