<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePantriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pantries', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('clave_elector')->unique()->nullable();
            $table->string('distrito')->nullable();
            $table->string('seccion')->nullable();
            $table->string('calle')->nullable();
            $table->string('cruzamiento')->nullable();
            $table->string('no_ext')->nullable();
            $table->string('no_int')->nullable();
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->date('fe_nacimiento')->nullable();
            $table->string('celular')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('image')->default('default.png');
            $table->string('pantry')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('status_pantry')->default('1');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pantries');
    }
}
