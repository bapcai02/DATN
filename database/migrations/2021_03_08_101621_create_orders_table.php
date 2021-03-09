<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('customer_id')->unsigned()->index('customer_id')->comment('customers.id');
            $table->bigInteger('shipping_id')->unsigned()->index('shipping_id')->comment('shippings.id');
            $table->bigInteger('payment_id')->unsigned()->index('payment_id')->comment('payments.id');
            $table->float('total');
            $table->integer('status');
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
        Schema::dropIfExists('orders');  
    }
}
