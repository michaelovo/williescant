<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number');
            $table->string('supplier_name');
            $table->double('total_price');
            $table->integer('total_items');
            $table->double('vat');
            $table->double('sub_total');
            $table->string('etr')
                ->default(NULL);
            $table->string('phone')
                ->default(NULL);
            $table->string('location')
                ->default(NULL);
            $table->string('website')
                ->default(NULL);
            $table->string('email')
                ->default(NULL);
            $table->date('date');
            $table->time('time')
                ->default(NULL);
            $table->string('status');
            $table->string('pin')
                ->default(NULL);
            $table->foreignUuid('purchased_by')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('purchases');
    }
}
