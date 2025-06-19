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
        Schema::create('adm_penduduk', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('penduduk')->default(0);
            $table->unsignedInteger('kepala_keluarga')->default(0);
            $table->unsignedInteger('laki_laki')->default(0);
            $table->unsignedInteger('perempuan')->default(0);
            $table->unsignedInteger('penduduk_sementara')->default(0);
            $table->unsignedInteger('mutasi_penduduk')->default(0);
            $table->unsignedInteger('belum_menikah')->default(0);
            $table->unsignedInteger('menikah')->default(0);
            $table->unsignedInteger('cerai_hidup')->default(0);
            $table->unsignedInteger('cerai_mati')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adm_penduduk');
    }
};
