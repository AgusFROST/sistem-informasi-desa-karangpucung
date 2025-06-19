<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('idm_status', function (Blueprint $table) {
            $table->id();
            $table->string('status')->unique();
            $table->timestamps();
        });

        // Insert default statuses
        DB::table('idm_status')->insert([
            ['status' => 'Mandiri'],
            ['status' => 'Maju'],
            ['status' => 'Berkembang'],
            ['status' => 'Tertinggal'],
            ['status' => 'Sangat Tertinggal'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('idm_status', function (Blueprint $table) {
            //
        });
    }
};
