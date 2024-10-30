<?php
declare(strict_types = 1);

namespace App\Region\Executor\Data;

use App\Base\Exceptions\BusinessException;
use App\Region\Executor\Data\DataGet\OblastData;
use App\Region\Executor\Data\DataGet\PolygonSearcherCached;
use App\Region\ORM\Repository\RegionPolygonRepository;

class DataGetExecutor
{
    public function __construct(
        private readonly PolygonSearcherCached $polygonSearcherCached,
        private readonly RegionPolygonRepository $regionPolygonRepository,
    ) {
    }
    
    public function execute(float $lan, float $lat): OblastData
    {
        $exist = $this->regionPolygonRepository->existAny();
        if (false === $exist) {
            throw new BusinessException('Att the first you need to refresh data via `data?action=refresh`');
        }
        
        return $this->polygonSearcherCached->searchByLatAndLan($lat, $lan);
    }
}
