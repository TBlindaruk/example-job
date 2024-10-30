<?php
declare(strict_types = 1);

namespace App\Region\Executor\Data\DataGet;

use Illuminate\Contracts\Cache\Repository;

class PolygonSearcherCached
{
    private const CACHE_TTL = 60 * 60;
    
    public function __construct(
        private readonly Repository $repository,
        private readonly PolygonSearcher $polygonSearcher,
    ) {
    }
    
    public function searchByLatAndLan(float $lat, float $lan): OblastData
    {
        $key = 'oblast_by_points:' . $lat . '-' . $lan;
        
        $kasKey = $this->repository->has($key);
        if (true === $kasKey) {
            return new OblastData($this->repository->get($key), true);
        }
        
        $data = $this->polygonSearcher->searchByLatAndLan($lat, $lan);
        
        $this->repository->put($key, $data, self::CACHE_TTL);
        
        return new OblastData($data, false);
    }
}
