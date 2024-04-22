<?php
declare(strict_types = 1);

namespace App\ORM\Manager;

use App\ORM\Models\Region;
use App\ORM\Models\RegionPolygon;

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
}
