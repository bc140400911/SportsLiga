<?php

namespace App\Console\Commands;

use App\Http\Controllers\teamController;
use Illuminate\Console\Command;
use App\Models\Match;

class updateMatches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:matches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to update matches data in the corresponding table if new update is available.';

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
    public function handle(Match $match)
    {

        $data  = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/eventsseason.php?s=1718&id=4335');

        $match->store($data);
    }
}
