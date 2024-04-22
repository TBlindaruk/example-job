<?php
declare(strict_types = 1);

namespace App\ORM\Models;

use App\ORM\Collection\RegionPolygonCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class RegionPolygon
 *
 * @property-read  $id
 * @property int   $region_id
 * @property array $polygon
 * @package App\ORM\Models
 */
class RegionPolygon extends Model
{
    protected $casts = [
        'polygon' => 'json',
    ];
    
    public function region(): belongsTo
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
    
    /**
     * @return Region
     * @uses region()
     */
    public function getRegion(): Region
    {
        return $this->getRelationValue('region');
    }
    
    public function newCollection(array $models = []): RegionPolygonCollection
    {
        return new RegionPolygonCollection($models);
    }
}
