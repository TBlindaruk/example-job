<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\JobGetRequest;
use App\Http\Resource\JobCollection;
use App\ORM\Repository\JobRepository;

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
