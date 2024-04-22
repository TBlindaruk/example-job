<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Data;

use App\Executor\Data\DataGetExecutor;
use App\Http\Requests\Data\DataGetRequest;
use App\Http\Resource\DataGetResource;

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
