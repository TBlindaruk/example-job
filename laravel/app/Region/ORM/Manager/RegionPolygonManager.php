<?php
declare(strict_types = 1);

namespace App\Region\ORM\Manager;

use App\Region\ORM\Models\Region;
use App\Region\ORM\Models\RegionPolygon;

class RegionPolygonManager
{
    public function createOrUpdate(Region $region, array $data): RegionPolygon
    {
        $regionPolygon = $region->getRegionPolygon();
        if (null === $regionPolygon) {
            $regionPolygon = new RegionPolygon();
            
            $regionPolygon->region_id = $region->id;
        }
        
        $regionPolygon->polygon = $data;
        
        $regionPolygon->save();
        
        return $regionPolygon;
    }
    
    public function deleteAll(): void
    {
        RegionPolygon::query()->delete();
    }
}
