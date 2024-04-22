<?php
declare(strict_types = 1);

namespace App\ORM\Repository;

use App\ORM\Collection\RegionCollection;
use App\ORM\Models\Job;
use App\ORM\Models\Region;
use Illuminate\Pagination\LengthAwarePaginator;

class RegionRepository
{
    public function getAllRegion(): RegionCollection
    {
        return Region::query()
            ->get();
    }
}
