<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatadirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datadiris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tlahirDiri');
            $table->date('tgllahirDiri');
            $table->date('mulai_bekerja');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('telp')->nullable();
            $table->string('hp');
            $table->string('email');
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
        Schema::dropIfExists('datadiris');
    }
}
