<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Stadium;
class UpdateStadiums extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:stadium';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to update stadium data in the corresponding table if new update is available.';

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
        $data    = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/lookup_all_teams.php?id=4335');
        $stadium = new Stadium;
        $stadium->store($data);
    }
}
