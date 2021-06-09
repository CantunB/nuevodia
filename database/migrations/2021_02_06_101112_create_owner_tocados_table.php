<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerTocadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_tocados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->unsignedBigInteger('tocado_id')->index();
            $table->foreign('tocado_id')->references('id')->on('sympathizers')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_tocados');
    }
}
