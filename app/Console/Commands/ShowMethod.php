<?php

namespace App\Console\Commands;

use App\Http\Controllers\CollectionsController;
use Illuminate\Console\Command;

class ShowMethod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:method';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will show you the index method of the CollectionsController';

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
     * @return int
     */
    public function handle()
    {
        $collectionsController = new CollectionsController();
        print_r($collectionsController->index());
    }
}
