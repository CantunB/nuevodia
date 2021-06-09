<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('clave_elector')->unique();
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
            $table->string('folio')->unique()->nullable();
            $table->string('employee_image')->default('employee.png');
            $table->string('employee_ine');
            $table->string('employee_boleta')->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('employees');
    }
}
