<?php
declare(strict_types = 1);

namespace App\Region\Http\Controller\Data;

use App\Region\Http\Resource\Data\DataPut;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class PutAction
{
    public function __construct(
        private readonly DataScheduleExecutor $dataScheduleExecutor,
    ) {
    }

    #[Route('/data', name: 'data_put', methods: 'PUT')]
    public function __invoke(#[MapRequestPayload] DataPut $dataPut): SuccessResource
    {
        return new SuccessResource(
            $this->dataScheduleExecutor->execute($dataPutRequest->getDelaySeconds())
        );
    }
}
