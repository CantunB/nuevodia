<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->string('email')->nullable();
            $table->string('telephone')->nullable();
            //$table->string('website')->nullable()->default('N/A');
            $table->string('address');
            //$table->string('rfc');
            $table->string('name_responsable')->nullable()->default('N/A');

            $table->string('address_responsable');

            $table->string('telephone_responsable')->nullable();
            //$table->string('description')->nullable()->default('N/A');
            $table->tinyInteger('status')->default('1');
            $table->string('company_file')->default('company.png');
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
        Schema::dropIfExists('enterprises');
    }
}
