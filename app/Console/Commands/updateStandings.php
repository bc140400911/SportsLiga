<?php

namespace App\Console\Commands;


use App\Http\Controllers\StandingController as standing;
use Illuminate\Console\Command;

class updateStandings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'standing:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Standing save in database';

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
    public function handle(standing $standing)
    {
       // $data = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/lookuptable.php?l=4328');
        $standing->create();
        $this->info('Standings data update');
    }
}
