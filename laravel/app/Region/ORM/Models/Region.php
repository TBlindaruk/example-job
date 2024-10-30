<?php
declare(strict_types = 1);

namespace App\Region\ORM\Models;

use App\Region\ORM\Collection\RegionCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Region
 *
 * @property-read string $name
 * @property-read int $id
 *
 * @package App\ORM\Models
 */
class Region extends Model
{
    public function newCollection(array $models = []): RegionCollection
    {
        return new RegionCollection($models);
    }
    
    public function regionPolygon(): HasOne
    {
        return $this->hasOne(RegionPolygon::class, 'region_id', 'id');
    }
    
    /**
     * @uses regionPolygon()
     * @return RegionPolygon|null
     */
    public function getRegionPolygon(): ?RegionPolygon
    {
        return $this->getRelationValue('regionPolygon');
    }
}
