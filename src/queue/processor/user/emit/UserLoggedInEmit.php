<?php

declare(strict_types=1);

namespace Micro\queue\processor\user\emit;

use Micro\queue\processor\user\UserEmit;

final class UserLoggedInEmit extends UserEmit
{
    public function execute(mixed $body): void
    {
        // Emit received with topic user_logged_in
    }

    public function getTopicName(): string
    {
        return 'user_logged_in';
    }

    public function getQueueName(): string
    {
        return sprintf('%s.user_logged_in_emit', $this->getQueue()->getAppName());
    }
}
