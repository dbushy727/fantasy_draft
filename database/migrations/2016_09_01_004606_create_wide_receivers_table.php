<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWideReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wide_receivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned();
            $table->integer('targets');
            $table->integer('receptions');
            $table->integer('reception_yards');
            $table->integer('reception_touchdowns');
            $table->integer('longest_reception');
            $table->integer('carries');
            $table->integer('rush_yards');
            $table->integer('rush_touchdowns');
            $table->integer('fumbles');
            $table->integer('fumbles_lost');

            $table->timestamps();

            $table->foreign('player_id')
                ->references('id')
                ->on('players')
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
        Schema::drop('wide_receivers');
    }
}
