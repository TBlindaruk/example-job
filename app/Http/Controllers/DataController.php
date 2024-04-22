<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\DataPutRequest;
use App\Http\Resource\SuccessResource;
use App\Jobs\MapUpdate;
use Illuminate\Contracts\Bus\QueueingDispatcher;
use Illuminate\Contracts\Routing\ResponseFactory;

class DataController
{
    public function __construct(
        private readonly ResponseFactory $responseFactory,
        private readonly QueueingDispatcher $queueingDispatcher,
    ) {
    }
    
    public function __invoke(DataPutRequest $dataPutRequest)
    {
//        $this->queueingDispatcher->dispatchToQueue(new MapUpdate());
        // TODO: improve it
        MapUpdate::dispatch($dataPutRequest->getDelaySeconds())->onConnection('redis');
        
        return new SuccessResource();
    }
}
