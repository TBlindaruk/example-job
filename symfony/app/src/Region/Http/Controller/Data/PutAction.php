<?php
declare(strict_types = 1);

namespace App\Region\Http\Controller\Data;

use App\Region\Http\Requests\Data\DataPut;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class PutAction
{
//    public function __construct(
//        private readonly DataScheduleExecutor $dataScheduleExecutor,
//    ) {
//    }

    #[Route('/data', name: 'data_put', methods: 'PUT', format: 'json')]
    public function __invoke(#[MapRequestPayload] DataPut $dataPut): JsonResponse
    {
        return new JsonResponse( // TODO: improve it - try to create a separate DTO
            [
                'data' => [
                    'status' => true
                ]
            ]
        );
    }
}
