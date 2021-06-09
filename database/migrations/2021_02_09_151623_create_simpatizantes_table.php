<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpatizantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simpatizantes', function (Blueprint $table) {
            $table->id();
            $table->string('clave_elector')->nullable()->default('N/A');;
            $table->string('nombre');
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('distrito')->nullable()->default('N/A');
            $table->string('seccion')->nullable()->default('N/A');
            $table->string('calle')->nullable()->default('N/A');
            $table->string('cruzamiento')->nullable()->default('N/A');
            $table->string('no_ext')->nullable()->default('N/A');
            $table->string('no_int')->nullable()->default('N/A');
            $table->string('colonia')->nullable()->default('N/A');
            $table->string('cp')->nullable()->default('N/A');
            $table->date('fe_nacimiento')->nullable();
            $table->string('celular')->nullable()->default('N/A');
            $table->string('email')->nullable()->default('N/A');
            $table->string('facebook')->nullable()->default('N/A');
            $table->string('gestion')->nullable()->default('N/A');
            $table->string('estatus_gestion')->nullable();
            $table->string('observacion')->nullable()->default('N/A');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpatizantes');
    }
}
