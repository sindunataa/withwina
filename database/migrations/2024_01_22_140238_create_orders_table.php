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
            $table->string('name');
            $table->float('weight');
            $table->integer('max');
            $table->float('distance');
            $table->integer('cost');
            $table->integer('total');
            $table->enum('status', ['pending', 'picked-up', 'running', 'dropped-off', 'cancelled']);
            $table->integer('drop_point_id');
            $table->integer('kusir_id');
            $table->integer('destination_id');
            $table->integer('user_id');
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
