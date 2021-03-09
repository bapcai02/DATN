<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVnQuanhuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vn_quanhuyen', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->string('name');
            $table->string('type');
            $table->bigInteger('matp')->unsigned()->index('matp')->comment('vn_tinhthanhpho.id');
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
        Schema::dropIfExists('vn_quanhuyen');
    }
}
