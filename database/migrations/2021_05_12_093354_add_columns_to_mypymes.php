<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMypymes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mypymes', function (Blueprint $table) {
            $table->string('trade_status')->nullable();
            $table->string('sympathizer')->nullable();
            $table->string('stay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mypymes', function (Blueprint $table) {
            $table->dropColumn('trade_status');
            $table->dropColumn('sympathizer');
            $table->dropColumn('stay');
        });
    }
}
