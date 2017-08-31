<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Coin;
use App\Ranking;
use App\CoinRanking;

DEFINE("TOP_COIN_LIMIT",200);

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        "Commands\PullRankings"
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->call(&pullRankings->dailyAt("08:00");
        $schedule->command("PullRankings:pullRankings")->dailyAt("08:00");
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

}
