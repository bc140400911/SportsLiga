<?php

namespace App\Console\Commands;

use App\Http\Controllers\PlayerController as player;
use Illuminate\Console\Command;

class savePlayer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'save and update data from Api';

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
    public function handle(player $players)
    {

        $players->create();
        $this->info('Player data enter successfully');

    }
}
