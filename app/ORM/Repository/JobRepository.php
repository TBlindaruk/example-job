<?php
declare(strict_types = 1);

namespace App\ORM\Repository;

use App\ORM\Models\Job;
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
