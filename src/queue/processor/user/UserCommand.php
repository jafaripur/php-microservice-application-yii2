<?php

declare(strict_types=1);

namespace Micro\queue\processor\user;

use Araz\MicroService\Processors\Command;

abstract class UserCommand extends Command
{
    public function getQueueName(): string
    {
        return 'user_service_command';
    }
}
