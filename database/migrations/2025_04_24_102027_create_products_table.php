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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('regular_price', 10, 2)->default(0.00);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('SKU')->nullable();
            $table->enum('stock_status', ['instock', 'outofstock']);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();    
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
};
