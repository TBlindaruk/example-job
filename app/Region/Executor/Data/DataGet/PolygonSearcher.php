<?php
declare(strict_types = 1);

namespace App\Region\Executor\Data\DataGet;

use App\Region\ORM\Models\Region;
use App\Region\ORM\Repository\RegionPolygonRepository;
use Location\Coordinate;
use Location\Polygon;

class PolygonSearcher
{
    public function __construct(
        private readonly RegionPolygonRepository $regionPolygonRepository,
    ) {
    }
    
    /**
     * @param float $lat
     * @param float $lan
     *
     * @return Region|null
     */
    public function searchByLatAndLan(float $lat, float $lan): ?Region
    {
        $regionPolygons = $this->regionPolygonRepository->getAll();
        
        foreach ($regionPolygons->all() as $regionPolygon) {
            $isInside = $this->isContain($lat, $lan, $regionPolygon->polygon[0] ?? []);
            
            if ($isInside) {
                return $regionPolygon->getRegion();
            }
        }
        
        return null;
    }
    
    private function isContain(float $lat, float $lan, array $polygon): bool
    {
        $geofence = new Polygon();
        foreach ($polygon as $polygonPoint) {
            if (is_float($polygonPoint[0])) {
                $geofence->addPoint(new Coordinate($polygonPoint[0], $polygonPoint[1]));
                continue;
            }
            
            if (is_array($polygonPoint[0])) {
                $isContain = $this->isContain($lat, $lan, $polygonPoint);
                if ($isContain === true) {
                    return true;
                }
            }
        }
        
        $outsidePoint = new Coordinate($lat, $lan);
        
        return $geofence->contains($outsidePoint);
    }
}
