<?php
declare(strict_types = 1);

namespace App\Http\Resource;

use App\ORM\Models\Job;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @uses \App\Http\Resource\JobResource::toArray()
 * Class SuccessResource
 *
 * @property Job $resource
 *
 * @package App\Http\Resource
 */
class JobCollection extends ResourceCollection
{

}
