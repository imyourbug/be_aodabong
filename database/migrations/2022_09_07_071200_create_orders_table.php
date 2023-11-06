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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->unique();
            $table->unsignedBigInteger('shipment_id');
            /**
             * 0 - wait for confirm, 1 - wait for prepare, 
             * 2 - shipping
             * 3 - wait for confirm cancel, 4 - canceled,
             * 5 - done, 
             * 6 - returning, 7 - returned
             */
            $table->integer('status');
            $table->integer('discount')->default(0);
            $table->integer('total_money');
            $table->integer('payment_method')->default(0); // 0 is cash, 1 is online payment
            $table->integer('payment_status')->default(0); // 0 is not done, 1 is done
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
