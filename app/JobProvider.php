<?php 

namespace App;

use App\UnlistedJob;
use JobApis\Jobs\Client\JobsMulti;

class JobProvider 
{

    public function getJobs() 
    {
        $providers = [
            'Careercast' => [],
            'Github' => [],
            'Govt' => [],
            'Ieee' => [],
            'Jobinventory' => [],
            'Monster' => [],
            'Stackoverflow' => []
        ];

        $client = new JobsMulti($providers);

        $client->setKeyword('junior');

        $jobs = $client->getAllJobs();

        foreach ($jobs->all() as $job) {
            $this->parseJob($job);
        }
    }

    public function parseJob($job) 
    {
        $lowerCaseJobTitle = strtolower($job->title);
        if (strpos($lowerCaseJobTitle, 'junior') !== false || strpos($lowerCaseJobTitle, 'entry') !== false) {
            UnlistedJob::create([
                'title' => $job->name,
                'description' => $job->description,
                'url' => $job->url,
                'location' => $job->location,
                'company' => $job->company
            ]);
        }
    }

}
