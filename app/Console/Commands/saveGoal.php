<?php

namespace App\Console\Commands;

use App\Http\Controllers\ScoreBoardController as goals;
use Illuminate\Console\Command;

class saveGoal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:goal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'save and update data from Api for goals';

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
    public function handle(goals $goals)
    {
        $goals->createGoal();
        $this->info('Goals data enter successfully');
    }
}
