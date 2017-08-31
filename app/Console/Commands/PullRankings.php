<?php

namespace App\Console\Commands;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Coin;
use App\Ranking;
use App\CoinRanking;

use Illuminate\Console\Command;

class PullRankings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:PullRankings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulls rankings from the internet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://api.coinmarketcap.com/v1/ticker/?limit=' . TOP_COIN_LIMIT);
        $json = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($json);

        $riser = -10000.0;
        $faller = 10000.0;
        $pump = -10000;
        $dump = 10000;
        $rid = $fid = $pid = $did = -1;
        $new_count = 0;

        $ranking = new Ranking;
        $ranking->title = "Power Rankings for " . date("F jS Y");
        $ranking->save();

        foreach($obj as $c){
            //Check database for id
            echo $c->id . "  ";
            $dbcoin = $new = 0;
            $dbcoin = DB::table('coins')->where('sid', $c->id)->first();
            if(empty($dbcoin)){
                //If coin does not exist, create new one
                $new = 1;
                $new_count += 1;
                $dbcoin = new Coin;

                $dbcoin->sid = $c->id;
                $dbcoin->symbol = $c->symbol;
                
                $dbcoin->save();
            }

            $cr = new stdClass();
            $cr->coin_id = $dbcoin->id;
            $cr->ranking_id = $ranking->id;
            foreach(array('rank', 'price_usd', 'price_btc', '24h_volume_usd', 'market_cap_usd', 'available_supply', 'available_supply', 'percent_change_1h', 'percent_change_24h', 'percent_change_7d') as $v){
                $cr->{$v} = $c->{$v};
            }
            $cr->new = $new;
            if($new){
                $cr->change = 0;
            }
            else{ //Pull this coin's ranking from last week and compare to this week
                $last = DB::table('coin_ranking')->where('coin_id', $dbcoin->id)->orderBy('id', 'desc')->first();
                $cr->change = $last->rank - $cr->rank;
            }

            $cr->save();

            //Check for updates to statistics
            if($cr->change > $riser){
                $rid = $cr->id;
            }
            if($cr->change < $faller){
                $fid = $cr->id; 
            }
            if($cr->percent_change_7d > $pump){
                $pid = $cr->id; 
            }
            if($cr->percent_change_7d < $dump){
                $did = $cr->id; 
            }

            
        }

        $ranking->riser_coin_ranking_id = $rid;
        $ranking->faller_coin_ranking_id = $fid;
        $ranking->pump_coin_ranking_id = $pid;
        $ranking->dump_coin_ranking_id = $did;

        $ranking->save();
    }
}
