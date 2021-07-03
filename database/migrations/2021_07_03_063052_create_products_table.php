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
            $table->foreignUuid('supplier_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('category_id')
                ->references('id')
                ->on('product_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('state')
                ->default('Pending');
            $table->string('name');
            $table->string('description')
                ->default(NULL);
            $table->string('brand')
                ->default(NULL);
            $table->string('color')
                ->default(NULL);
            $table->double('unit_price');
            $table->integer('quantity');
            $table->string('unit_description');
            $table->string('sku')
                ->default(NULL);
            $table->string('size')
                ->default(NULL);
            $table->tinyInteger('available');
            $table->string('image')
                ->default(NULL);
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
