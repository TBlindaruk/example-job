<?php
declare(strict_types = 1);

namespace App\Region\Http\Resource;

use App\Region\ORM\Models\Job;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @uses \App\Region\Http\Resource\JobResource::toArray()
 * Class SuccessResource
 *
 * @property Job $resource
 *
 * @package App\Http\Requests
 */
class JobCollection extends ResourceCollection
{

}
