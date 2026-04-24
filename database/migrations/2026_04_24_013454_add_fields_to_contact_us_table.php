<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_us', 'name'))    $table->string('name')->nullable()->after('id');
            if (!Schema::hasColumn('contact_us', 'email'))   $table->string('email')->nullable()->after('name');
            if (!Schema::hasColumn('contact_us', 'phone'))   $table->string('phone')->nullable()->after('email');
            if (!Schema::hasColumn('contact_us', 'subject')) $table->string('subject')->nullable()->after('phone');
            if (!Schema::hasColumn('contact_us', 'message')) $table->text('message')->nullable()->after('subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone', 'subject', 'message']);
        });
    }
}
