<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('interests', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');  // Add job_id column
    
            // Optionally add a foreign key constraint
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('interests', function (Blueprint $table) {
            $table->dropForeign(['job_id']);  // Drop foreign key constraint
            $table->dropColumn('job_id');     // Drop job_id column
        });
    }
    
};
