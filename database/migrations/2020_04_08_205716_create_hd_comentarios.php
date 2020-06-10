<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHdComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hd_comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('cComentarios');
            $table->integer('nFolio_ticket')->references('id')->on('hd_reg_tickets');
            $table->integer('nUser_id')->references('id')->on('hd_users');
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
        Schema::dropIfExists('hd_comentarios');
    }
}
