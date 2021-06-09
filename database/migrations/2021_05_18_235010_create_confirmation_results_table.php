<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmation_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobilizer_id')->references('id')->on('sympathizers')->onDelete('cascade');
            $table->foreignId('tocado_id')->references('id')->on('sympathizers')->onDelete('cascade');
            $table->tinyInteger('confirmation_status');
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
        Schema::dropIfExists('confirmation_results');
    }
}
