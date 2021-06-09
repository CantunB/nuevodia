<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTocadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tocados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tocado_id')->index();
            $table->unsignedBigInteger('mobilizer_id')->index();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tocado_id')
                ->references('id')
                ->on('sympathizers')
                ->onDelete('cascade');

            $table->foreign('mobilizer_id')
                ->references('id')
                ->on('sympathizers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tocados');
    }
}
