<?php
declare(strict_types = 1);

namespace App\Region\ORM\Collection;

use App\Region\ORM\Models\Region;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RegionCollection
 *
 * @method Region[] all()
 *
 * @package App\ORM\Collection
 */
class RegionCollection extends Collection
{
    /**
     * @return void
     * @uses \App\Region\ORM\Models\Region::regionPolygon()
     */
    public function loadMissingRegionPolygon(): void
    {
        $this->loadMissing('regionPolygon');
    }
}
