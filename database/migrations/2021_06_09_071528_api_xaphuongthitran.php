<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApiXaphuongthitran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_xaphuongthitran', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('maqh');
            $table->bigInteger('maxptr');
            $table->string('name');
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
        Schema::dropIfExists('api_xaphuongthitran');
    }
}
