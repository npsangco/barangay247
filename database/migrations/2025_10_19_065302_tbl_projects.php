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
        Schema::create('tbl_projects', function (Blueprint $table){
            $table -> id('project_id');
            $table -> string('project_name', 100);
            $table -> text('project_description');
            $table -> date('start_date');
            $table -> date('end_date');
            $table -> text('project_status');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_projects');
    }
};
