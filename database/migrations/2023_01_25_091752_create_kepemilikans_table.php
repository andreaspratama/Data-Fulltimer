<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepemilikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepemilikans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('datadiri_id');
            $table->string('tptTinggal');
            $table->string('ket');
            $table->string('transport');
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
        Schema::dropIfExists('kepemilikans');
    }
}
