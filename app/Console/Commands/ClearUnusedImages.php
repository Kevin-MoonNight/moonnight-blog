<?php

namespace App\Console\Commands;

use App\Http\Controllers\ImagesController;
use Illuminate\Console\Command;

class ClearUnusedImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete unused image';

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
     */
    public function handle()
    {
        ImagesController::clearUnusedImages();

        $this->info('Unused images have been deleted!');
    }
}
