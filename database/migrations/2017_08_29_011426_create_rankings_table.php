<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')
            $table->integer('riser_coin_ranking_id')->unsigned()->nullable();
            $table->integer('faller_coin_ranking_id')->unsigned()->nullable();
            $table->integer('pump_coin_ranking_id')->unsigned()->nullable();
            $table->integer('dump_coin_ranking_id')->unsigned()->nullable();

            $table->integer('new_count')->nullable();
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
        Schema::dropIfExists('rankings');
    }
}
