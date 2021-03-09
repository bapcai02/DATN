<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id', 'orders_ibfk_1')->references('id')->on('customers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('shipping_id', 'orders_ibfk_2')->references('id')->on('shippings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('payment_id', 'orders_ibfk_3')->references('id')->on('payments')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_ibfk_1');
            $table->dropForeign('orders_ibfk_2');
            $table->dropForeign('orders_ibfk_3');
        });
    }
}
