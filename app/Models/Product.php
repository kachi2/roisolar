<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id', 'name', 'slug', 'title', 'cost_price', 'description', 'specification', 'image_path', 'price', 'sale_price', 'discount', 'views', 'order_count', 'sku', 'qty', 'status'
    ];

    /**
     * Automatically generate a unique slug when creating a product.
     */
    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $base = Str::slug($product->name);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $product->slug = $slug;
            }
        });
    }

    protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
