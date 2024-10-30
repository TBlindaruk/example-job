<?php
declare(strict_types = 1);

namespace App\Region\Http\Controller\Data;

use App\Base\Http\Resource\SuccessResource;
use App\Region\ORM\Manager\RegionPolygonManager;
use Illuminate\Http\Request;

// TODO: is not used
class DeleteAction
{
    public function __construct(
        private readonly RegionPolygonManager $regionPolygonManager,
    ) {
    }
    
    public function __invoke(Request $request): SuccessResource
    {
        $this->regionPolygonManager->deleteAll();
        
        return new SuccessResource(true);
    }
}
