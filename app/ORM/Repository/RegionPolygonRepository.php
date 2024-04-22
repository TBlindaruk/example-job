<?php
declare(strict_types = 1);

namespace App\ORM\Repository;

use App\ORM\Collection\RegionPolygonCollection;
use App\ORM\Models\RegionPolygon;

class RegionPolygonRepository
{
    public function getAll(): RegionPolygonCollection
    {
        return RegionPolygon::query()->get();
    }
}
