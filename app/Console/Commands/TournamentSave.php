<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TournamentController as Tournament;

class TournamentSave extends Command
{

    protected $signature = 'tournament:save';


    protected $description = 'Save and update tournament data in db';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle(Tournament $tournament)
    {
        $tournament->create();
        $this->info('Tournament data enter successfully');
    }
}
