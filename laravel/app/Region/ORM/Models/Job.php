<?php
declare(strict_types = 1);

namespace App\Region\ORM\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 *
 * @property-read        $id
 * @property             $status
 * @property-read Carbon $created_at
 * @property int         $delay_seconds
 *
 * @package App\Models
 */
class Job extends Model
{
    private const STATUS_CREATED = 0;
    private const STATUS_FAILED_ON_PUSH = 1;
    private const STATUS_FINISHED = 2;
    private const STATUS_FAILED_ON_QUEUE = 3;
    
    public const STATUS = [
        self::STATUS_CREATED,
        self::STATUS_FAILED_ON_PUSH,
        self::STATUS_FINISHED,
        self::STATUS_FAILED_ON_QUEUE,
    ];
    
    public function setStatusCreated(): void
    {
        $this->status = self::STATUS_CREATED;
    }
    
    public function setStatusFinished(): void
    {
        $this->status = self::STATUS_FINISHED;
    }
    
    public function setStatusFailedOnPush(): void
    {
        $this->status = self::STATUS_FAILED_ON_PUSH;
    }
    
    public function setStatusFailedOnQueue(): void
    {
        $this->status = self::STATUS_FAILED_ON_QUEUE;
    }
}
