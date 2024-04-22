<?php
declare(strict_types = 1);

namespace App\Region\Executor\Polygon;

use App\Region\ORM\Manager\JobManager;
use App\Region\ORM\Manager\RegionPolygonManager;
use App\Region\ORM\Models\Job;
use App\Region\ORM\Repository\RegionRepository;
use App\Region\Executor\Polygon\PolygonRetriever;
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
            $datas = $this->polygonRetriever->getPolygons($region->name);
            
            $this->regionPolygonManager->createOrUpdate($region, $datas[0]['geojson']['coordinates'] ?? []);
        }
    }
}
