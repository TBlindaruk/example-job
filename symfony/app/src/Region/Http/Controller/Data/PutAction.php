<?php
declare(strict_types = 1);

namespace App\Region\Http\Controller\Data;

use App\Region\Http\Requests\Data\DataPut;
use App\Region\Worker\Message\MapUpdate;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;
use Symfony\Component\Routing\Attribute\Route;

class PutAction
{
    #[Route('/data', name: 'data_put', methods: 'PUT', format: 'json')]
    public function __invoke(
        #[MapRequestPayload] DataPut $dataPut,
        MessageBusInterface $messageBus
    ): JsonResponse
    {
        $messageBus->dispatch(
            new MapUpdate(),
            [new DelayStamp($dataPut->getDelaySeconds())]
        );

        return new JsonResponse( // TODO: improve it - try to create a separate DTO
            [
                'data' => [
                    'status' => true
                ]
            ]
        );
    }
}
