<?php

namespace App\Console\Commands;


use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automating Daily Backups';

//     public function __construct()
//   {
//     parent::__construct();
//   }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (! Storage::exists('backup')) {
            Storage::makeDirectory('backup');
        }
 

        $filename = Carbon::now()->format('Y-m-d-h-i-s') . ".sql";
    
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD')
                . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') 
                . " > " . storage_path() . "/app/backup/" . $filename;
 


        // $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
    
        // $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD')
        // . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') 
        // . "  | gzip > " . storage_path() . "/app/backup/" . $filename;

 
        $returnVar = NULL;
        $output  = NULL;
 
        exec($command, $output, $returnVar);
    }
}
