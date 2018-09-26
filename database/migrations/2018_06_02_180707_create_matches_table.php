<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('api_id');
            $table->unsignedInteger('first_team');
            $table->foreign('first_team')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedInteger('second_team');
            $table->foreign('second_team')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedInteger('tournament_id');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->unsignedInteger('stadium_id')->nullable();
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade');
            $table->string("first_team_name");
            $table->string("second_team_name");
            $table->date("date");
            $table->date("start_date");
            $table->string("status")->nullable();
            $table->date("end_date")->nullable();
            $table->string("spectators")->nullable();
            $table->string("season")->nullable();
            $table->integer("round");
            $table->integer("match_abandoned")->nullable();
            $table->integer("match_drawn")->nullable();
            $table->time("start_time");
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
        Schema::dropIfExists('matches');
    }
}
