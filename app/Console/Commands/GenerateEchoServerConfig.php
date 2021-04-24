<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateEchoServerConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'echo-server:config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates laravel-echo-server.json file from dotenv variables';

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
        $config = json_encode(config('echo-server'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
		$filename = base_path() . '/laravel-echo-server.json';
		if (file_put_contents($filename, $config) === false) {
			throw new \Exception('Error Saving file, check file and script permissions!');
		}
    }
}
