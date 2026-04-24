<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Product;

class AddSlugToProductsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('products', 'slug')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('name');
            });
        }

        // Backfill slugs for existing products
        foreach (Product::all() as $product) {
            if ($product->slug) continue;
            $base = Str::slug($product->name);
            $slug = $base;
            $i = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $base . '-' . $i++;
            }
            $product->timestamps = false;
            $product->slug = $slug;
            $product->save();
        }

        // Add unique index if not already present
        try {
            Schema::table('products', function (Blueprint $table) {
                $table->unique('slug');
            });
        } catch (\Exception $e) {
            // index already exists, skip
        }
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
