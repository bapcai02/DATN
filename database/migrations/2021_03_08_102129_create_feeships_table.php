<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeships', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('matp')->unsigned()->index('matp')->comment('vn_tinhthanhpho.id');
            $table->bigInteger('maqh')->unsigned()->index('maqh')->comment('vn_quanhuyen.id');
            $table->bigInteger('maxptr')->unsigned()->index('maxptr')->comment('vn_xaphuongthitran.id');
            $table->float('feeship');
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
        Schema::dropIfExists('feeships');
    }
}
