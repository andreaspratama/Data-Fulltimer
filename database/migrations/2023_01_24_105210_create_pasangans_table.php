<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('datadiri_id');
            $table->string('status')->nullable();
            $table->string('namaPasa')->nullable();
            $table->string('tlahirPasa')->nullable();
            $table->date('tgllahirPasa')->nullable();
            $table->string('pekerjaanPasa')->nullable();
            $table->string('pend_akhir')->nullable();
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
        Schema::dropIfExists('pasangans');
    }
}
