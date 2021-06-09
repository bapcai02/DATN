<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('product_id')->unsigned()->index('product_id')->comment('products.id');
            $table->bigInteger('user_id')->unsigned()->index('user_id')->comment('users.id');
            $table->integer('rating');
            $table->string('message');
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
        
            Schema::dropIfExists('ratings');
        
    }
}
