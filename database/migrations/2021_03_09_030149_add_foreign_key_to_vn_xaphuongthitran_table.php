<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToVnXaphuongthitranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vn_xaphuongthitran', function (Blueprint $table) {
            $table->foreign('maqh', 'vn_xaphuongthitran_ibfk_1')->references('id')->on('vn_quanhuyen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vn_xaphuongthitran', function (Blueprint $table) {
            $table->dropForeign('vn_xaphuongthitran_ibfk_1');
        });
    }
}
