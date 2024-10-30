<?php
declare(strict_types = 1);

namespace App\Region\Http\Controllers\Data;

use App\Region\Executor\Data\DataScheduleExecutor;
use App\Region\Http\Requests\Data\DataPutRequest;
use App\Base\Http\Resource\SuccessResource;

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
