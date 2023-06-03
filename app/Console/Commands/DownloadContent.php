<?php

namespace App\Console\Commands;

use App\Models\Content;
use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\InputStream;

class DownloadContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-content {content_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloads media content to the server associated with it.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $content = Content::with(['platform', 'server'])->find($this->argument('content_id'));
        $server = $content->server;
        $host = $server->ssh_host_name;
        $user = $server->ssh_user_name;
        $password = $server->ssh_password;
        $path = $content->folder_path;

        $content_url = $content->platform->domain . $content->url;

        $css_selector = '';
        if($content->media_type == 'movie'){
            $css_selector = $content->platform->platform_css_selector()->where('media_type', 'movie')->first()->css_selector;
        }

        if($content->media_type == 'series'){
            $css_selector = $content->platform->platform_css_selector()->where('media_type', 'series')->first()->css_selector;
        }

        $process = new Process(["node", "get-download-urls.js", $content_url, $css_selector]);
        $process->setWorkingDirectory(base_path());
        $process->run();

        if ($process->isSuccessful()) {
            $output = $process->getOutput();
            $links = json_decode($output, true);
            foreach ($links as $link) {
                $download = new Process(
                    [
                        'node',
                        'download.js',
                        '--host='.$host,
                        '--username='.$user,
                        '--password='.$password,
                        '--path='.$path,
                        '--content='.$link,
                    ]
                );
                $download->setWorkingDirectory(base_path());
                $download->setPty(true);
                $download->enableOutput();
                $download->run(function ($type, $buffer) {
                    if (Process::ERR === $type) {
                        echo 'ERR > ' . $buffer;
                    } else {
                        echo 'OUT > ' . $buffer;
                    }
                });

            }

        } else {
            // Handle the case when the request was not successful
            $output = $process->getErrorOutput();
            return 1;
        }

    }
}
