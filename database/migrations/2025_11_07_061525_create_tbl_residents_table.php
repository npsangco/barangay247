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
        Schema::create('tbl_residents', function (Blueprint $table) {
            $table->id('resident_id');
            $table->string('resident_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->bigInteger('contact_information');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_residents');
    }
};
