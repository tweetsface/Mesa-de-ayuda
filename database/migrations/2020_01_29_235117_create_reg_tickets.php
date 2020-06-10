<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('hd_reg_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cTitulo');
            $table->string('cCategoria')->references('id')->on('hd_categorias');
            $table->string('cSistema')->references('id')->on('hd_sistemas');
            $table->string('cPrioridad')->references('id')->on('hd_estado');
            $table->string('cDesProblema');
            $table->string('cEstado')->references('id')->on('hd_estado');
            $table->string('cOpcsitema')->nullable();
            $table->string('cImagen')->nullable();
            $table->string('nFolio_Users')->references('id')->on('Hd_users'); //Temporalmente 
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
        Schema::dropIfExists('hd_reg_tickets');
    }
}
