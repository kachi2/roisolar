<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddSlugToServicesTable extends Migration
{
    public function up()
    {
        // 1. Add nullable slug column (no ->change(), no Doctrine DBAL needed)
        if (!Schema::hasColumn('services', 'slug')) {
            Schema::table('services', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('title');
            });
        }

        // 2. Backfill slugs for existing rows
        $services = DB::table('services')->get(['id', 'title']);
        foreach ($services as $service) {
            $base = Str::slug($service->title);
            $slug = $base;
            $i = 1;
            while (DB::table('services')->where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                $slug = $base . '-' . $i++;
            }
            DB::table('services')->where('id', $service->id)->update(['slug' => $slug]);
        }

        // 3. Add unique index
        try {
            Schema::table('services', function (Blueprint $table) {
                $table->unique('slug');
            });
        } catch (\Exception $e) {
            // Index may already exist
        }
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
