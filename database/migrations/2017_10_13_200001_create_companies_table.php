<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name', 191);
            $table->string('address', 191);
            $table->integer('zip_code');
            $table->decimal('map_lat', 10, 8);
            $table->decimal('map_lng', 11, 8);
            $table->string('phone_number', 50);
            $table->string('fax_number', 50)->nullable();
            $table->string('email_address', 191)->nullable();
            $table->integer('total_rooms');
            $table->integer('price_range');
            $table->string('information', 191)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
