<?php
declare(strict_types = 1);

namespace App\Executor;

use App\ORM\Manager\JobManager;
use App\ORM\Manager\RegionPolygonManager;
use App\ORM\Models\Job;
use App\ORM\Repository\RegionRepository;
use App\Service\Polygon\PolygonRetriever;
use Illuminate\Log\LogManager;

class RegionPolygonUpdateExecutor
{
    public function __construct(
        private readonly JobManager $jobManager,
        private readonly LogManager $logManager,
        private readonly PolygonRetriever $polygonRetriever,
        private readonly RegionRepository $regionRepository,
        private readonly RegionPolygonManager $regionPolygonManager,
    ) {
    }
    
    public function execute(Job $job): void
    {
        try {
            $this->updatePolygons();
        } catch (\Throwable $throwable) {
            $this->jobManager->updateToStatusFailedOnQueue($job);
            $this->logManager->error('ERROR_DURING_PROCESSING_POLYGONS', [
                'job_id'        => $job->id,
                'error_message' => $throwable->getMessage(),
            ]);
            
            return;
        }
        
        $this->jobManager->updateToStatusFinished($job);
    }
    
    private function updatePolygons(): void
    {
        $regions = $this->regionRepository->getAllRegion();
        $regions->loadMissingRegionPolygon();
        
        foreach ($regions->all() as $region) {
            $data = $this->polygonRetriever->getPolygons($region->name);
            $this->regionPolygonManager->createOrUpdate($region, $data[0]['geojson']['coordinates'] ?? []);
        }
    }
}
