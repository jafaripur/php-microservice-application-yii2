<?php

declare(strict_types=1);

use Araz\MicroService\Queue;
use Micro\components\UserServiceComponents;

/**
 * @var $psrLogger Psr\Log\LoggerInterface
 */

return [
    'components' => [
        'userServiceQueue' => static function () use ($psrLogger) {
            return new Queue(
                getenv('APP_NAME', true),
                [
                    'dsn' => getenv('QUEUE_AMQP_DSN', true),
                    'lazy' => true,
                    'persisted' => true,
                    'heartbeat' => 10,
                    "qos_prefetch_count" => 1,
                ],
                $psrLogger,
                null,
                true,
                true,
                [
                    Micro\queue\consumer\ConsumerFirst::class,
                    Micro\queue\consumer\ConsumerSecond::class,
                ],
            );
        },
        'userService' => [
            'class' => UserServiceComponents::class,
            'queueName' => 'userServiceQueue',
        ],
    ],
];
