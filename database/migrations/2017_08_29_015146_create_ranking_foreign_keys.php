<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rankings', function (Blueprint $table) {
            $table->foreign('riser_coin_ranking_id')->references('id')->on('coin_ranking')->onDelete('cascade')->nullable();
            $table->foreign('faller_coin_ranking_id')->references('id')->on('coin_ranking')->onDelete('cascade')->nullable();
            $table->foreign('pump_coin_ranking_id')->references('id')->on('coin_ranking')->onDelete('cascade')->nullable();
            $table->foreign('dump_coin_ranking_id')->references('id')->on('coin_ranking')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('riser_coin_ranking_id');
        $table->dropForeign('faller_coin_ranking_id');
        $table->dropForeign('pump_coin_ranking_id');
        $table->dropForeign('dump_coin_ranking_id');
    }
}
