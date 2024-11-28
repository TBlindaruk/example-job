<?php

namespace App\Region\Worker\MessageHandler;

use App\Region\Worker\Message\MapUpdate;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class MapUpdateHandler
{
    public function __invoke(MapUpdate $message): void
    {
        // do something with your message
    }
}
