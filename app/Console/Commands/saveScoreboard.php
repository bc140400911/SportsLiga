<?php

namespace App\Console\Commands;

use App\Http\Controllers\ScoreBoardController as scoreboard;
use Illuminate\Console\Command;

class saveScoreboard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:scoreboard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'save and update data from api for scoreboard';

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
    public function handle(scoreboard $scoreboard)
    {
        $scoreboard->createScore();
        $this->info('Scoreboard data enter successfully');
    }
}
