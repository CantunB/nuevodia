<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMypymesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mypymes', function (Blueprint $table) {
            $table->id();
            $table->string('name_commerce')->nullable();
            $table->string('name_owner')->nullable();
            $table->string('name_promoter')->nullable();
            $table->string('distrito')->nullable();
            $table->string('seccion')->nullable();
            $table->string('turn')->nullable();
            $table->string('calle')->nullable();
            $table->string('cruzamiento')->nullable();
            $table->string('no_ext')->nullable();
            $table->string('no_int')->nullable();
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->date('date')->nullable();
            $table->string('votantes')->nullable();
            $table->string('celular')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('social_network')->nullable();
            $table->string('gestion')->nullable();
            $table->string('observation')->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('mypymes');
    }
}
