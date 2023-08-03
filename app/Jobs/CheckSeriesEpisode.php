<?php

namespace App\Jobs;

use App\Models\Content;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class CheckSeriesEpisode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $series = Content::with(['platform', 'server'])
            ->where('media_type', 'series')
            ->get();

        $count = 0;
        foreach ($series as $latest) {
            $server = $latest->server;
            $host = $server->ssh_host_name;
            $user = $server->ssh_user_name;
            $password = $server->ssh_password;
            $path = $latest->folder_path;
            $content_url = $latest->platform->domain . $latest->url;

            if ($latest->platform->domain !== 'https://akw.to/') {
                continue;
            }

            $urls = $this->fetchUrls($content_url);
            if ($urls !== false) {
                $count += $this->downloadEpisodes($host, $user, $password, $path, $urls);
            } else {
                Log::info('Failed to fetch URLs for content URL: ' . $content_url);
            }
        }

        Log::info('series-check-count', [$count]);
    }

    private function fetchUrls($content_url)
    {
        $process = new Process(["node", "scrape.js", $content_url, 'latest', 'series']);
        $process->setWorkingDirectory(base_path());
        $process->setTimeout(360);
        $process->run();

        if ($process->isSuccessful()) {
            $output = $process->getOutput();
            Log::info('total-output', [$output]);
            return json_decode($output, true);
        }

        Log::info('error-message', [$process->getErrorOutput()]);
        return false;
    }

    private function downloadEpisodes($host, $user, $password, $path, $urls)
    {
        $successCount = 0;

        foreach ($urls as $link) {
            $download = new Process([
                'node',
                'download.js',
                '--host=' . $host,
                '--username=' . $user,
                '--password=' . $password,
                '--path=' . $path,
                '--content=' . $link,
            ]);

            $download->setWorkingDirectory(base_path());
            $download->setPty(true);
            $download->setTimeout(360);
            $download->enableOutput();
            $download->run();

            Log::info('download-error', [$download->getErrorOutput()]);

            if ($download->isSuccessful()) {
                $successCount++;
            }
        }

        return $successCount;
    }
}

