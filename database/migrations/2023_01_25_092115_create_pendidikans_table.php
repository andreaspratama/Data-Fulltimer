<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('datadiri_id');
            $table->string('sd')->nullable();
            $table->string('smp')->nullable();
            $table->string('sma')->nullable();
            $table->string('univ')->nullable();
            $table->string('kursus')->nullable();
            $table->text('kursusImg')->nullable();
            $table->string('seminar')->nullable();
            $table->text('semImg')->nullable();
            $table->string('pelatihan')->nullable();
            $table->text('pelatihanImg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikans');
    }
}
