<?php
declare(strict_types = 1);

namespace App\Region\Executor\Data;

use App\Region\Executor\Data\DataGet\PolygonSearcherCached;

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
