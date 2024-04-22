<?php
declare(strict_types = 1);

namespace App\Region\Http\Resource;

use App\Region\ORM\Models\Job;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SuccessResource
 *
 * @property Job $resource
 *
 * @package App\Http\Resource
 */
class JobResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'createdTs' => $this->resource->created_at->getTimestamp(),
            'sheduledForTs' => $this->resource->created_at->getTimestamp() + $this->resource->delay_seconds,
            'state' => $this->resource->status,
        ];
    }
}
