<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToVnQuanhuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vn_quanhuyen', function (Blueprint $table) {
            $table->foreign('matp', 'vn_quanhuyen_ibfk_1')->references('id')->on('vn_tinhthanhpho')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vn_quanhuyen', function (Blueprint $table) {
            $table->dropForeign('vn_quanhuyen_ibfk_1');
        });
    }
}
