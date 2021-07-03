<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number');
            $table->string('pin');
            $table->string('etr');
            $table->foreignId('supplier_id');
            $table->double('sub_total');
            $table->double('vat');
            $table->double('total_price');
            $table->double('total_items');
            $table->string('customer_name')
                ->default(NULL);
            $table->date('date');
            $table->time('time')
                ->default(NULL);
            $table->string('status');
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
        Schema::dropIfExists('sales');
    }
}
