<?php
declare(strict_types = 1);

namespace App\ORM\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegionPolygon
 *
 * @property int          $region_id
 * @property array|string $polygon
 * @package App\ORM\Models
 */
class RegionPolygon extends Model
{
    protected $casts = [
        'polygon' => 'json',
    ];
}
