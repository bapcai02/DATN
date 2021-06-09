<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('category_id')->unsigned()->index('category_id')->comment('categorys.id');
            $table->bigInteger('brand_id')->unsigned()->index('brand_id')->comment('brands.id');
            $table->bigInteger('seller_id')->unsigned()->index('seller_id')->comment('sellers.id');
            $table->string('product_name');
            $table->string('slug');
            $table->text('product_desc');
            $table->text('product_content');
            $table->string('product_price');
            $table->string('product_status');
            $table->float('sale');
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
        
            Schema::dropIfExists('products');
        
    }
}
