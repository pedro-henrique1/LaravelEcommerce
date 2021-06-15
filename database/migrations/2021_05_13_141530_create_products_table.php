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
        Schema::create(
            'products',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->string('short_description', 600)->nullable();
                $table->text('description');
                $table->decimal('regular_price');
                $table->decimal('sale_price')->nullable();
                $table->string('SKU');
                $table->enum('stock_status', ['instock', 'outofstock']);
                $table->boolean('featured')->default(false);
                $table->unsignedInteger('quantify')->default('10');
                $table->string('image')->nullable();
                $table->text('images')->nullable();
                $table->bigInteger('category_id')->unsigned()->nullable();
                $table->timestamps();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            }
        );
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
