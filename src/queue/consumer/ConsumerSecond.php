<?php

declare(strict_types=1);

namespace Micro\queue\consumer;

use Araz\MicroService\ProcessorConsumer;
use Generator;

final class ConsumerSecond extends ProcessorConsumer
{
    public function getConsumerIdentify(): string
    {
        return 'second-consumer';
    }

    /**
     * @inheritDoc
     */
    public function getProcessors(): Generator
    {
        // Workers
        yield \Micro\queue\processor\user\worker\UserProfileAnalysisWorker::class;
    }

    public function getPrefetchCount(): int
    {
        return 2;
    }
}
