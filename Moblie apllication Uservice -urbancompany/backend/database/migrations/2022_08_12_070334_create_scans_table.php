<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scans', function (Blueprint $table) {
            $table->id();
            $table->string('register_number');
            $table->date('date');
            $table->bigInteger('bag')->default(null);
            $table->bigInteger('lunch')->default(null);
            $table->bigInteger('dinner')->default(null);
            $table->string('other_1');
            $table->string('other_2');
            $table->string('other_3');
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
        Schema::dropIfExists('scans');
    }
}
