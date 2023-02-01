<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('datadiri_id');
            $table->string('namaAnak')->nullable();
            $table->string('jk')->nullable();
            $table->string('tlahirAnak')->nullable();
            $table->date('tgllahirAnak')->nullable();
            $table->text('pendpekerja')->nullable();
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
        Schema::dropIfExists('anaks');
    }
}
