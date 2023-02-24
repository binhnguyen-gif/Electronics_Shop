<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:file {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new file';

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
//        $folder = $this->argument('folder');
        $filename = $this->argument('filename');
        $directory1 = 'app/Repositories';
        $directory2 = 'app/Interfaces';
        $file_path1 = $directory1 . '/' . $filename . 'Repository.php';
        $file_path2 = $directory2 . '/' . $filename . 'RepositoryInterface.php';

        if (! File::exists($file_path1) && ! File::exists($file_path1)) {
            File::put($file_path1, '');
            File::put($file_path2, '');
            $this->info('File created successfully.');
        } else {
            $this->error('File already exists.');
        }
    }
}
