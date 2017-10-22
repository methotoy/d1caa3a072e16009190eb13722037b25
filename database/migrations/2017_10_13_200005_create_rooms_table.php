<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name', 191);
            $table->integer('facilities');
            $table->integer('capacity');
            $table->string('details', 90)->nullable();
            $table->string('status', 90)->default(1);
            $table->timestamps();

            // $table->foreign('hotel_id')
            //     ->references('id')
            //     ->on('hotels');

            // $table->foreign('type_id')
            //     ->references('id')
            //     ->on('room_types');

            // $table->foreign('rate_id')
            //     ->references('id')
            //     ->on('room_rates');

            // $table->foreign('category_id')
            //     ->references('id')
            //     ->on('room_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
