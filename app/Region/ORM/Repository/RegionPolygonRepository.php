<?php
declare(strict_types = 1);

namespace App\Region\ORM\Repository;

use App\Region\ORM\Collection\RegionPolygonCollection;
use App\Region\ORM\Models\RegionPolygon;

class RegionPolygonRepository
{
    public function getAll(): RegionPolygonCollection
    {
        return RegionPolygon::query()->get();
    }
    
    public function existAny(): bool
    {
        return RegionPolygon::query()->exists();
    }
}
