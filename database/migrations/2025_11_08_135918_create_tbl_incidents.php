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
            $table -> foreignId('resident_id')->constrained('tbl_residents');
            $table -> foreignId('official_id')->constrained('tbl_officials');
            $table -> string('incident_type');
            $table -> string('incident_details');
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
