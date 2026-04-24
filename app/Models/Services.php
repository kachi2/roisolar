<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class services extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = [
    'title', 'contents', 'images', 'brief', 'slug'
    ];

    protected static function booted()
    {
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $base = Str::slug($service->title);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $service->slug = $slug;
            }
        });
    }
}
