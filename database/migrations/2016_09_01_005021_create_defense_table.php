<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('tackles_for_loss');
            $table->integer('sacks');
            $table->integer('interceptions');
            $table->integer('fumbles_recovered');
            $table->integer('safeties');
            $table->integer('defensive_touchdowns');
            $table->integer('return_touchdowns');
            $table->integer('points_allowed');

            $table->timestamps();

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('defenses');
    }
}
