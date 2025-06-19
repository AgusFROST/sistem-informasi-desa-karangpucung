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
        Schema::create('idm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idm_status_id')->constrained('idm_status')->onDelete('cascade');
            $table->string('nilai');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('idm', function (Blueprint $table) {
            //
        });
    }
};
