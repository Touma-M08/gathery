<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->integer('category_id')->unsigned();
            $table->integer('prefecture_id')->unsigned();
            $table->string('address');
            $table->string('time_mon');
            $table->string('time_tue');
            $table->string('time_wed');
            $table->string('time_thu');
            $table->string('time_fri');
            $table->string('time_sat');
            $table->string('time_sun');
            $table->string('tel')->nullable();
            $table->float('score')->default(0);
            $table->double('lat');
            $table->double('lng');
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
        Schema::dropIfExists('places');
    }
}
