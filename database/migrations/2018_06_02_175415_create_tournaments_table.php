<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('api_id');
            $table->unsignedInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->string("name");
            $table->text("description");
            $table->string("logo");
            $table->string("alternate_name");
            $table->date("first_event");
            $table->string("gender");
            $table->string("country");
            $table->string("website");
            $table->string("status")->nullable();
            $table->string("start_date")->nullable();
            $table->string("end_date")->nullable();
            $table->string("establish_at");
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
        Schema::dropIfExists('tournaments');
    }
}
