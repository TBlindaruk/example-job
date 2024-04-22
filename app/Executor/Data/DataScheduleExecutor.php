<?php
declare(strict_types = 1);

namespace App\Executor\Data;

use App\Jobs\MapUpdate;
use App\ORM\Manager\JobManager;
use Illuminate\Bus\Dispatcher;
use Illuminate\Log\LogManager;

class DataScheduleExecutor
{
    public function __construct(
        private readonly Dispatcher $dispatcher,
        private readonly JobManager $jobManager,
        private readonly LogManager $logManager,
    ) {
    }
    
    public function execute(int $delaySeconds): bool
    {
        $jobModel = $this->jobManager->create($delaySeconds);
        
        try {
            $this->dispatcher->dispatch(
                (new MapUpdate($jobModel))->delay($delaySeconds)
            );
        } catch (\Throwable $throwable) {
            $this->jobManager->updateToStatusFailedOnPush($jobModel);
            $this->logManager->error('FAILED_TO_PUSH_IN_QUEUE', [
                'job_id'        => $jobModel->id,
                'error_message' => $throwable->getMessage(),
            ]);
            
            return false;
        }
        
        return true;
    }
}
