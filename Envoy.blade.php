@setup
    $laravel = require_once __DIR__.'/bootstrap/app.php';
    $kernel = $laravel->make(\Illuminate\Contracts\Console\$kernel::class);
    $kernel->bootstrap(); 
    
    use Illuminate\Support\Facades\SSH;


@endsetup

@servers(['web' => $server_connection_string])

@task('download-content', ['on' => 'web'])
    echo $ssh_password | ssh -o "StrictHostKeyChecking=no" {{ $server }}
    cd $download_path
    wget $download_url
@endtask