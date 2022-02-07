<?php

declare(strict_types=1);

namespace Micro\queue\consumer;

use Araz\MicroService\ProcessorConsumer;
use Generator;

final class ConsumerFirst extends ProcessorConsumer
{
    public function getConsumerIdentify(): string
    {
        return 'first-consumer';
    }

    /**
     * @inheritDoc
     */
    public function getProcessors(): Generator
    {
        //Command
        yield \Micro\queue\processor\user\command\UserGetInfoCommand::class;

        //Emits
        yield \Micro\queue\processor\user\emit\UserLoggedInEmit::class;

        //Topics
        yield \Micro\queue\processor\user\topic\UserCreatedTopic::class;

        //Workers
        yield \Micro\queue\processor\user\worker\UserProfileAnalysisWorker::class;
        yield \Micro\queue\processor\user\worker\UserProfileUpdateNotificationWorker::class;
    }
}
