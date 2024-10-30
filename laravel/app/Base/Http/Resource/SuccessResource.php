<?php
declare(strict_types = 1);

namespace App\Base\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property bool $resource
 *
 * Class SuccessResource
 *
 * @package App\Http\Requests
 */
class SuccessResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'success' => $this->resource,
        ];
    }
}
