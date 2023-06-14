<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable()->default('');
            $table->bigInteger('phone_number')->unique()->nullable()->default(null);
            $table->string('email')->nullable()->default('');
            $table->string('password')->nullable()->default('');
            $table->string('remarks')->nullable()->default('');
            $table->integer('status')->default(1);
            $table->string('other_1')->nullable()->default('');
            $table->string('other_2')->nullable()->default('');
            $table->string('other_3')->nullable()->default('');
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
        Schema::dropIfExists('customers');
    }
}
