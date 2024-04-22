<?php
declare(strict_types = 1);

namespace App\Executor\Data\DataGet;

use App\ORM\Models\Region;

class OblastData
{
    public function __construct(
        public readonly ?Region $region,
        public readonly bool $cached
    ) {
    }
}
