<?php

namespace App\Jobs;

use App\ORM\Manager\JobManager;
use App\ORM\Models\Job as JobModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MapUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public function __construct(
        private readonly JobModel $jobModel,
    ) {
    
    }
    
    public function handle(JobManager $jobManager): void
    {
        $jobManager->updateToStatusFinished($this->jobModel);
    }
}
