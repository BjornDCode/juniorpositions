<?php 

namespace App;

// use GuzzleHttp\Client as Guzzle;
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
            echo $job->title . PHP_EOL;
        }
    }
    
    // public function getJobs() 
    // {
    //     $client = new Guzzle;

    //     // $result = $client->request('GET', 'https://community-angellist.p.mashape.com/jobs', [
    //     //     'headers' => [
    //     //         "X-Mashape-Key" => "TE7qz8RTTbmshTnTX0NMEf2bIhA2p1exLtEjsnKJe2FLh6A8Go",
    //     //         "Accept" => "application/json"
    //     //     ]
    //     // ]);

    //     $results = $client->request('GET', 'https://jobs.github.com/positions.json?description=junior');

    //     $results = json_decode($results->getBody());

    //     foreach ($results as $result) {
    //         $this->parseJob($result);
    //     }
    // }

    // public function parseJob($job) 
    // {
    //     echo $job->title;
    // }

}
