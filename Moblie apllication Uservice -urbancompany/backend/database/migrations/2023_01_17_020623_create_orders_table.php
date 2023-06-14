<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('order_by');
            $table->string('phone');
            $table->string('order_product');
            $table->string('date');
            $table->string('price');
            $table->string('payment_mode');
            $table->string('address');
            $table->string('card_info');
            $table->string('otp');
            $table->string('otp_status');
            $table->string('remarks')->nullable()->default('');
            $table->integer('status')->default(1);
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
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
        Schema::dropIfExists('orders');
    }
}
