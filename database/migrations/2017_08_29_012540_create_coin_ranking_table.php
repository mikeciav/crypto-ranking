<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinRankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_ranking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coin_id')->unsigned();
                $table->foreign('coin_id')->references('id')->on('coins')->onDelete('cascade');
            $table->integer('ranking_id')->unsigned();
                $table->foreign('ranking_id')->references('id')->on('rankings')->onDelete('cascade');
            $table->unsignedInteger('rank');
            $table->integer('change');
            $table->boolean('new');
            $table->text('comments')->nullable();
            $table->decimal('price_usd', 9, 2);
            $table->decimal('price_btc', 9, 9);
            $table->decimal('24h_volume_usd', 18, 2);
            $table->decimal('market_cap_usd', 18, 2);
            $table->decimal('available_supply', 18, 2);
            $table->decimal('total_supply', 18, 2);
            $table->decimal('percent_change_1h', 6, 2);
            $table->decimal('percent_change_24h', 6, 2);
            $table->decimal('percent_change_7d', 6, 2);
            $table->timestamp('cmc_last_updated');
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
        Schema::dropIfExists('coin_ranking');
    }
}
