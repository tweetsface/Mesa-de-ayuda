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
            $table->bigIncrements('nFolio');
            $table->string('cTitulo');
            $table->string('cCategoria');
            $table->string('cSistema');
            $table->string('cPrioridad');
            $table->string('cDesProblema');
            $table->string('cEstado');
            $table->string('cOpcsitema')->nullable();
            $table->string('cImagen')->nullable();
            $table->string('nFolio_Users')->references('nFolio')->on('Hd_users'); //Temporalmente campo nulo,relacionar con usuarios utilizando Foreikey
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
        Schema::dropIfExists('reg_tickets');
    }
}
