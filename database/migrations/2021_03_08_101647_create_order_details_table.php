<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('order_id')->unsigned()->index('order_id')->comment('orders.id');
            $table->bigInteger('product_id')->unsigned()->index('product_id')->comment('products.id');
            $table->bigInteger('seller_id')->unsigned()->index('seller_id')->comment('sellers.id');
            $table->string('coupon');
            $table->integer('fee_ship');   
            $table->integer('product_sales_quantity');
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
        Schema::dropIfExists('order_details'); 
    }
}
