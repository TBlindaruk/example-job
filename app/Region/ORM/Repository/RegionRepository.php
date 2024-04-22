<?php
declare(strict_types = 1);

namespace App\Region\ORM\Repository;

use App\Region\ORM\Collection\RegionCollection;
use App\Region\ORM\Models\Job;
use App\Region\ORM\Models\Region;
use Illuminate\Pagination\LengthAwarePaginator;

class RegionRepository
{
    public function getAllRegion(): RegionCollection
    {
        return Region::query()
            ->get();
    }
}
