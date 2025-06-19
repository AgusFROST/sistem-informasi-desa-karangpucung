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
        Schema::create('umur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rentang_umur_id')->constrained('rentang_umur')->onDelete('cascade');
            $table->foreignId('gender_id')->constrained('gender')->onDelete('cascade');
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umur');
    }
};
