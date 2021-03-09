<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('product_id', 'order_details_ibfk_1')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('order_id', 'order_details_ibfk_2')->references('id')->on('orders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('seller_id', 'order_details_ibfk_3')->references('id')->on('sellers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_ibfk_1');
            $table->dropForeign('order_details_ibfk_2');
            $table->dropForeign('order_details_ibfk_3');
        });
    }
}
