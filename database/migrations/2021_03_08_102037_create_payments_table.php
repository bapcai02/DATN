<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('order_id')->unsigned()->index('order_id')->comment('orders.id');
            $table->string('thanh_vien');
            $table->float('money');
            $table->string('note');
            $table->string('vnp_response_code');
            $table->string('code_vnpay');
            $table->string('code_bank');
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
        Schema::dropIfExists('payments');
    }
}
