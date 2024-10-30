<?php
declare(strict_types = 1);

namespace App\Region\Http\Resource;

use App\Region\Executor\Data\DataGet\OblastData;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class DataGetResource
 *
 * @property-read OblastData resource
 *
 * @package App\Http\Resource
 */
class DataGetResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'geo' => [
                'oblast' => $this->resource->region?->name,
            ],
            'cache' => $this->resource->cached === false ? 'miss' : 'present',
        ];
    }
}
