<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('api_id');
            $table->unsignedInteger('match_id');
            $table->foreign('match_id')->references('id')->on('matches');
            $table->unsignedInteger('team_one');
            $table->foreign('team_one')->references('id')->on('teams');
            $table->unsignedInteger('team_two');
            $table->foreign('team_two')->references('id')->on('teams');
            $table->integer('team_one_score');
            $table->integer('team_two_score');
            $table->integer('season');
            $table->string('result');
            $table->unsignedInteger('man_of_the_match')->nullable();
            $table->foreign('man_of_the_match')->references('player_id')->on('players');
            $table->integer('man_of_the_match_score')->nullable();
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
        Schema::dropIfExists('score_boards');
    }
}
