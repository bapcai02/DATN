<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFeeshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feeships', function (Blueprint $table) {
            $table->foreign('matp', 'feeships_ibfk_1')->references('id')->on('vn_tinhthanhpho')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('maqh', 'feeships_ibfk_2')->references('id')->on('vn_quanhuyen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('maxptr', 'feeships_ibfk_3')->references('id')->on('vn_xaphuongthitran')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feeships', function (Blueprint $table) {
            $table->dropForeign('feeships_ibfk_1');
            $table->dropForeign('feeships_ibfk_2');
            $table->dropForeign('feeships_ibfk_3');
        });
    }
}
