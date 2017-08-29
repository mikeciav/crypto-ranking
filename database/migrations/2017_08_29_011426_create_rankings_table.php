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
            $table->string('title')->nullable();
            $table->integer('riser_coin_ranking_id')->unsigned();
            $table->integer('faller_coin_ranking_id')->unsigned();
            $table->integer('pump_coin_ranking_id')->unsigned();
            $table->integer('dump_coin_ranking_id')->unsigned();

            $table->integer('new_count');
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
