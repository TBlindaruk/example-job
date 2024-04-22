<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Data;

use App\Executor\Data\DataScheduleExecutor;
use App\Http\Requests\Data\DataPutRequest;
use App\Http\Resource\SuccessResource;

class PutAction
{
    public function __construct(
        private readonly DataScheduleExecutor $dataScheduleExecutor,
    ) {
    }
    
    public function __invoke(DataPutRequest $dataPutRequest): SuccessResource
    {
        return new SuccessResource(
            $this->dataScheduleExecutor->execute($dataPutRequest->getDelaySeconds())
        );
    }
}
