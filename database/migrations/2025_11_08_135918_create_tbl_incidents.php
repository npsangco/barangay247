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
        Schema::create('tbl_incidents', function (Blueprint $table){
            $table -> id('report_id');
            $table -> foreignId('resident_id')->constrained('tbl_residents', 'resident_id')->onDelete('cascade');
            $table -> foreignId('official_id')->nullable()->constrained('tbl_officials', 'official_id')->onDelete('set null');
            $table -> string('incident_type', 100);
            $table -> text('incident_details');
            $table -> date('date_reported');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_incidents');
    }
};
