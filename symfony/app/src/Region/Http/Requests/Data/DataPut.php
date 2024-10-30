<?php
declare(strict_types = 1);

namespace App\Region\Http\Requests\Data;

use Symfony\Component\Validator\Constraints as Assert;

class DataPut
{
    public function __construct(
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(120)]
        public readonly int $delaySeconds,
    ) {
    }

    public function getDelaySeconds(): int
    {
        return $this->delaySeconds ?? 1;
    }
}