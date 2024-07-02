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
        Schema::create('sektor_pertanian',function(Blueprint $table){
            $table->id();
            $table->string('komoditas');
            $table->unsignedBigInteger('periode_id');
            $table->string('jumlah');
            $table->string('warna');
            $table->string('jenis_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sektor_pertanian');
    }
};
