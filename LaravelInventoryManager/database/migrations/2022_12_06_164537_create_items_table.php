<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_title')-> unique();
            $table->text('item_description');
            $table->integer('item_price');
            $table->integer('item_quantity');
            $table->string('item_sku', 10);
            $table->text('item_picture')->nullable();
            $table->bigInteger('categories_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['item_title', 'item_sku']);
            $table->index('item_title');
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
