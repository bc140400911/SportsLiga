<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TeamController as Team;
class TeamsSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'team:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save and Update data from api';

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
    public function handle(Team $team)
    {
        $team->create();
        $this->info('Teams data enter successfully');
    }
}
