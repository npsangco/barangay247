<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_officials', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('tbl_residents', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('tbl_households', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('tbl_incidents', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_officials', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('tbl_residents', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('tbl_households', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('tbl_incidents', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
