<?php

namespace App\Jobs;

use App\Models\Content;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class DownloadContent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $content;
    /**
     * Create a new job instance.
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $exitCode = Artisan::call('app:download-content', [
            'content_id' => $this->content->id,
        ]);

        if($exitCode == 0)
        {
            $this->content->process_status = 'processed';
            $this->content->download_status = 'started';
        } else {
            $this->content->process_status = 'failed';
            $this->content->download_status = 'failed';
        }

        $this->content->save();
    }
}
