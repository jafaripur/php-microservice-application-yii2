<?php

declare(strict_types=1);

namespace Micro\queue\processor\user;

use Araz\MicroService\Processors\Worker;

abstract class UserWorker extends Worker
{
    public function getQueueName(): string
    {
        return 'user_service_worker';
    }
}
