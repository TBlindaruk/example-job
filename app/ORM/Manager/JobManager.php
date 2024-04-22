<?php
declare(strict_types = 1);

namespace App\ORM\Manager;

use App\ORM\Models\Job;
use Carbon\Carbon;

class JobManager
{
    public function create(int $delaySeconds): Job
    {
        $job = new Job();
        $job->setStatusCreated();
        $job->delay_seconds = $delaySeconds;
        
        $job->save();
        
        return $job;
    }
    
    public function updateToStatusFinished(Job $job): Job
    {
        $job->setStatusFinished();
        
        $job->save();
        
        return $job;
    }
    
    public function updateToStatusFailedOnPush(Job $job):Job
    {
        $job->setStatusFailedOnPush();
    
        $job->save();
    
        return $job;
    }
    
    public function updateToStatusFailedOnQueue(Job $job): Job
    {
        $job->setStatusFailedOnQueue();
        
        $job->save();
        
        return $job;
    }
}
