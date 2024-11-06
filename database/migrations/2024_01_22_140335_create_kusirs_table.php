<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKusirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kusirs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('weight');
            $table->integer('max');
            $table->integer('cost');
            $table->integer('max_person');
            $table->enum('status', ['waiting', 'running', 'finished']);
            $table->string('image');
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
        Schema::dropIfExists('kusirs');
    }
}
