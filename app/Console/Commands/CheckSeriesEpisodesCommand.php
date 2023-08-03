<?php

namespace App\Console\Commands;

use App\Jobs\CheckSeriesEpisode;
use Illuminate\Console\Command;

class CheckSeriesEpisodesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-series-episodes-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CheckSeriesEpisode::dispatch();
        $this->info('Series episodes checked and downloaded successfully.');
    }
}
