<?php
declare(strict_types = 1);

namespace App\Region\Http\Controller\Data;

use App\Region\Executor\Data\DataGetExecutor;
use App\Region\Http\Requests\Data\DataGetRequest;
use App\Region\Http\Resource\DataGetResource;

// TODO: is not used

class GetAction
{
    public function __construct(
        private readonly DataGetExecutor $dataGetExecutor,
    ) {
    }
    
    public function __invoke(DataGetRequest $dataPutRequest): DataGetResource
    {
        return new DataGetResource(
            $this->dataGetExecutor->execute($dataPutRequest->getLan(), $dataPutRequest->getLat())
        );
    }
}
