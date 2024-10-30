<?php
declare(strict_types = 1);

namespace App\Region\Http\Controllers;

use App\Region\Http\Requests\JobGetRequest;
use App\Region\Http\Resource\JobCollection;
use App\Region\ORM\Repository\JobRepository;

class JobController
{
    public function __construct(
        private readonly JobRepository $jobRepository,
    ) {
    }
    
    public function __invoke(JobGetRequest $jobGetRequest): JobCollection
    {
        return new JobCollection(
            $this->jobRepository->getPaginatorByStatus(
                $jobGetRequest->getStatus(),
                $jobGetRequest->getLimit(),
                $jobGetRequest->getPage(),
            )
        );
    }
}
