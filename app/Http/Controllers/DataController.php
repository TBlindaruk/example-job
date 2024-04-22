<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Executor\DataScheduleExucutor;
use App\Http\Requests\DataPutRequest;
use App\Http\Resource\SuccessResource;

class DataController
{
    public function __construct(
        private readonly DataScheduleExucutor $dataScheduleExecutor,
    ) {
    }
    
    public function __invoke(DataPutRequest $dataPutRequest): SuccessResource
    {
        return new SuccessResource(
            $this->dataScheduleExecutor->execute($dataPutRequest->getDelaySeconds())
        );
    }
}
