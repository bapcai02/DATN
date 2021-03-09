<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id', 'products_ibfk_1')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('brand_id', 'products_ibfk_2')->references('id')->on('brands')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('seller_id', 'products_ibfk_3')->references('id')->on('sellers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_ibfk_1');
            $table->dropForeign('products_ibfk_2');
            $table->dropForeign('products_ibfk_3');
        });
    }
}
