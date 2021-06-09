<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmen', function (Blueprint $table) {
            $table->id();
            $table->string('clave_elector')->unique();
            $table->string('nombre');
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('distrito')->nullable();
            $table->string('seccion')->nullable();
            $table->string('calle')->nullable();
            $table->string('cruzamiento')->nullable();
            $table->string('no_ext')->nullable();
            $table->string('no_int')->nullable();
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->date('fe_nacimiento')->nullable();
            $table->string('celular')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('facebook')->nullable();
            $table->string('gestion')->nullable();
            $table->string('estatus_gestion')->nullable();
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('carmen');
    }
}
