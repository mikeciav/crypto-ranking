<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    public function coinRankings(){
		return $this->belongsToMany('App\CoinRanking');
    }
}
