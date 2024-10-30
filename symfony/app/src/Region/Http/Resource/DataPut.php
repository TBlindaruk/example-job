<?php
declare(strict_types = 1);

namespace App\Region\Http\Resource\Data;
use Symfony\Component\Validator\Constraints as Assert;

class DataPut
{
    public function __construct(
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(120)]
        public readonly int $delaySeconds,
    ) {
    }
}