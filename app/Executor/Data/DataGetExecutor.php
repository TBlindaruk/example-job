<?php
declare(strict_types = 1);

namespace App\Executor\Data;

use App\Executor\Data\DataGet\PolygonSearcherCached;

class DataGetExecutor
{
    public function __construct(
        private readonly PolygonSearcherCached $polygonSearcherCached,
    ) {
    }
    
    public function execute(float $lan, float $lat)
    {
        return $this->polygonSearcherCached->searchByLatAndLan($lat, $lan);
    }
}
