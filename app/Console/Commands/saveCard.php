<?php

namespace App\Console\Commands;

use App\Http\Controllers\ScoreBoardController as cards;
use Illuminate\Console\Command;

class saveCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:card';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'save and update data from Api for cards';

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
    public function handle(cards $card)
    {
        $card->createCards();
        $this->info('Cards data enter successfully');
    }
}
