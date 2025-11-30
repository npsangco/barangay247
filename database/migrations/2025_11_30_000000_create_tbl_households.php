<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_households', function (Blueprint $table) {
            $table->id('household_id');
            $table->string('household_head', 100);
            $table->string('address'); 
            $table->string('contact_information', 100);
            $table->unsignedSmallInteger('number_of_members')->default(1);
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_households');
    }
};