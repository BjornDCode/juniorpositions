<?php 

namespace App;

use App\Job;
use App\UnlistedJob;
use JobApis\Jobs\Client\JobsMulti;

class JobProvider 
{

    protected $providers = [];
    protected $client;

    public function __construct()
    {
        
    }

    public function prepare() 
    {
        $this->providers = [
            'Careercast' => [],
            'Github' => [],
            'Govt' => [],
            'Ieee' => [],
            'Jobinventory' => [],
            'Monster' => [],
            'Stackoverflow' => []
        ];

        $this->client = new JobsMulti($this->providers);
        $this->client->setKeyword('junior');

        return $this;
    }

    private function getJobs() 
    {
        $jobs = $this->client->getAllJobs();

        foreach ($jobs->all() as $job) {
            $this->parseJob($job);
        }
    }

    public function getAllJobs() 
    {
        $this->client->setOptions([
            'maxAge' => 90
        ]);

        $this->getJobs();
    }

    public function getDailyJobs() 
    {
        $this->client->setOptions([
            'maxAge' => 1
        ]);

        $this->getJobs();
    }

    public function getMonthlyJobs() 
    {
        $this->client->setOptions([
            'maxAge' => 30
        ]);

        $this->getJobs();
    }

    private function parseJob($job) 
    {
        if (!$this->jobHasKeywordInTitle($job->title) || $this->jobDoesExist($job)) {
            return;
        }

        $this->createUnlistedJob($job);
    }

    private function createUnlistedJob($job) 
    {
        UnlistedJob::create([
            'title' => $job->name,
            'description' => $job->description,
            'url' => $job->url,
            'location' => $job->location,
            'company' => $job->company
        ]);
    }

    private function jobHasKeywordInTitle($jobTitle) 
    {
        return strpos(strtolower($jobTitle), 'junior') !== false;
    }

    private function jobDoesExist($job) 
    {
        $existingListedJob = Job::where('apply_url', $job->url)->first();
        $existingUnlistedJob = UnlistedJob::where('url', $job->url)->first();
        return $existingListedJob || $existingUnlistedJob;
    }

}
