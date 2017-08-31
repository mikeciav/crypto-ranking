<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
	public function coinRankings(){
		return $this->hasMany('App\CoinRanking');
	}

	public function logView(){
	    DB::table('ranking_views')->insert(['ranking_id' => $this->id]);
	}
}
