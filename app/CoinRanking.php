<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinRanking extends Model
{
	public function coin(){
    	return $this->hasOne('App\Coin');
    }

    public function ranking(){
    	return $this->belongsTo('App\Ranking');
    }
}
