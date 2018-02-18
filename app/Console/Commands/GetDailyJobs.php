<?php

namespace App\Console\Commands;

use App\JobProvider;
use Illuminate\Console\Command;

class GetDailyJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all jobs that are a maximum of 1 day old';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(JobProvider $provider)
    {
        parent::__construct();

        $this->provider = $provider;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->provider->prepare()->getDailyJobs();
    }
}
