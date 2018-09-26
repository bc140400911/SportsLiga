<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('player_id');
            $table->integer('api_id');
            $table->unsignedInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->string("name")->nullable();
            $table->longText("description")->nullable();
            $table->integer("age")->nullable();
            $table->string("date_of_signing")->nullable();
            $table->string("team_name")->nullable();
            $table->string("bowling_style")->nullable();
            $table->string("batting_style")->nullable();
            $table->string("date_of_birth")->nullable();
            $table->string("test_debut")->nullable();
            $table->string("odi_debut")->nullable();
            $table->string("t20_debut")->nullable();
            $table->string("birth_place")->nullable();
            $table->string("position")->nullable();
            $table->string("nationality")->nullable();
            $table->text("twitter")->nullable();
            $table->text("instagram")->nullable();
            $table->text("facebook")->nullable();
            $table->text('height')->nullable();
            $table->text('weight')->nullable();
            $table->text('income')->nullable();
            $table->string('thumb_pic')->nullable();
            $table->string('profile_pic')->nullable();
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
        Schema::dropIfExists('players');
    }
}
