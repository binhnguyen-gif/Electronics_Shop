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
    protected $signature = 'command:file {filename}';

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
        $directory = 'app/Repositories';
        $file_path = $directory . '/' . $filename;

        if (! File::exists($file_path)) {
            File::put($file_path, '');
            $this->info('File created successfully.');
        } else {
            $this->error('File already exists.');
        }
    }
}
