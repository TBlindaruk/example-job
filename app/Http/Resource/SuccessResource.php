<?php
declare(strict_types = 1);

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    public function __construct($resource = null)
    {
        parent::__construct($resource);
    }
    
    public function toArray($request): array
    {
        return [
            'data' => [
                'success' => true,
            ],
        ];
    }
}
