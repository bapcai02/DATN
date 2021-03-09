<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->bigInteger('id',true)->unsigned();
            $table->bigInteger('product_id')->unsigned()->index('product_id')->comment('products.id');
            $table->bigInteger('tag_id')->unsigned()->index('tag_id')->comment('tags.id');
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
       
            Schema::dropIfExists('product_tags');
        
    }
}
