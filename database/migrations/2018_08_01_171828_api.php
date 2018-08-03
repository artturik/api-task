<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Api extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price');
            $table->string('type');
            $table->string('size');
            $table->string('color');
            $table->timestamps();

            $table->unique(['type', 'size', 'color']);
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('order_id');

            $table->index('product_id');
            $table->index('order_id');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::disableForeignKeyConstraints();

        Schema::drop('product_order');
        Schema::drop('orders');
        Schema::drop('products');

        Schema::enableForeignKeyConstraints();
    }
}
