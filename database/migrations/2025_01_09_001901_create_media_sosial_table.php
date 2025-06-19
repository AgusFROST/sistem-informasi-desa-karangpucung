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
        Schema::create('medsos_svg', function (Blueprint $table) {
            $table->id();
            $table->text('svg')->nullable();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('media_sosial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medsos_svg_id'); // Relasi ke tabel medsos_svg
            $table->string('url')->nullable();
            $table->timestamps();

            // Membuat foreign key ke tabel medsos_svg
            $table->foreign('medsos_svg_id')->references('id')->on('medsos_svg')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_sosial');
    }
};
