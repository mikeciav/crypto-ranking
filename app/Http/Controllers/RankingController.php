<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Image;
use Session;

use App\Ranking;

use App\Coin;
use App\CoinRanking;

class RankingController extends Controller
{
	public function index(Request $request)
    {
        $ranking=Ranking::orderBy('id', 'desc')->first();
        $ranking->logView();           
        return view('rankings.show', compact('ranking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ranking=Ranking::find($id)->first();
        $ranking->logView();

        $previous=Ranking::where('id', '<', $id)->orderBy('id', 'desc')->first();
        if($!empty($previous)){
            $prev_id = $previous->id;
        }

        $prev_id = $id - 1;
        $latest=Ranking::where('id', '>', $id)->orderBy('id', 'asc')->first();
        if($!empty($latest)){
            $next_id = $latest->id;
        }
        return view('rankings.show', compact('ranking', $prev_id, $next_id));
    }

