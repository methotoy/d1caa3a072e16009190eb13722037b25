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
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('type')->unsigned();
            $table->string('name', 90);
            $table->string('address', 90);
            $table->string('city', 90);
            $table->integer('zip_code');
            $table->string('phone_number', 10);
            $table->string('email_address', 90)->nullable();
            $table->string('information', 90)->nullable();
            $table->string('details', 90)->nullable();
            $table->timestamps();

            // $table->foreign('type')->references('id')->on('company_types');
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
