<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVnXaphuongthitranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vn_xaphuongthitran', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('maqh')->unsigned()->index('maqh')->comment('vn_quanhuyen.id');
            $table->string('name');
            $table->string('type');
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
        Schema::dropIfExists('vn_xaphuongthitran');
    }
}
