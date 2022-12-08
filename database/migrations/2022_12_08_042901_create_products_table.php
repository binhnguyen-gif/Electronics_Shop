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
            $table->id();
            $table->string('name');
            $table->bigInteger('category_id')->unsigned();
            $table->string('alias');
            $table->string('avatar');
            $table->string('img');
            $table->string('sortDesc');
            $table->text('detail');
            $table->bigInteger('producer_id')->unsigned();
            $table->integer('number');
            $table->integer('number_buy');
            $table->integer('sale');
            $table->integer('price');
            $table->integer('price_sale');
            $table->boolean('trash');
            $table->boolean('status');
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('producer_id')->references('id')->on('producers');
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
