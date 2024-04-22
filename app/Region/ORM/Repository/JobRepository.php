<?php
declare(strict_types = 1);

namespace App\Region\ORM\Repository;

use App\Region\ORM\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;

class JobRepository
{
    public function getPaginatorByStatus(int $status, int $perPage, int $page): LengthAwarePaginator
    {
        return Job::query()
            ->where('status', '=', $status)
            ->paginate(
                perPage: $perPage,
                page: $page,
            );
    }
}
