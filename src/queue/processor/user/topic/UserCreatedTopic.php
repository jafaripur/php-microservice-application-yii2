<?php

declare(strict_types=1);

namespace Micro\queue\processor\user\topic;

use Araz\MicroService\Processors\RequestResponse\RequestTopic;
use Micro\queue\processor\user\UserTopic;

final class UserCreatedTopic extends UserTopic
{
    public function execute(RequestTopic $request): void
    {
    }

    public function getTopicName(): string
    {
        return 'user_changed';
    }

    public function getRoutingKeys(): array
    {
        return [
            'user_topic_create',
            'user_topic_update',
        ];
    }

    public function getQueueName(): string
    {
        return sprintf('%s.user_created_topic', $this->getQueue()->getAppName());
    }
}
