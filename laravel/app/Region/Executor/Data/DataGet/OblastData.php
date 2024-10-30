<?php
declare(strict_types = 1);

namespace App\Region\Executor\Data\DataGet;

use App\Region\ORM\Models\Region;

class OblastData
{
    public function __construct(
        public readonly ?Region $region,
        public readonly bool $cached
    ) {
    }
}
