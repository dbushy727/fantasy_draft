<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuarterbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarter_backs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned();
            $table->integer('completions');
            $table->integer('pass_attempts');
            $table->integer('pass_yards');
            $table->integer('pass_touchdowns');
            $table->integer('interceptions');
            $table->integer('rating');
            $table->integer('carries');
            $table->integer('rush_yards');
            $table->integer('rush_touchdowns');

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
        Schema::drop('quarter_backs');
    }
}
