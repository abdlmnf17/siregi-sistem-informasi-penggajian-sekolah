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
        Schema::create('gajis', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('guru_id')->unsigned();
            $table->foreign('guru_id')->references('id')->on('gurus');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan');
            $table->integer('potongan');
            $table->integer('jumlah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
