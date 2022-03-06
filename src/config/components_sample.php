<?php

declare(strict_types=1);

use Araz\MicroService\AmqpConnection;
use Araz\MicroService\Queue;
use Araz\Service\User\UserService;
use Micro\components\UserServiceComponents;
use yii\di\Instance;

/**
 * @var $psrLogger Psr\Log\LoggerInterface
 */

return [
    'components' => [
        'microserviceQueue' => static function() {
            return new AmqpConnection([
                'dsn' => getenv('QUEUE_AMQP_DSN', true),
                'lazy' => true,
                'persisted' => true,
                'heartbeat' => 10,
                "qos_prefetch_count" => 1,
            ]);
        },
        'userServiceQueue' => static function () use ($psrLogger) {
            
            /**
             * @var AmqpConnection
             */
            $amqpConnection = Instance::ensure('microserviceQueue', AmqpConnection::class);

            return new Queue(
                getenv('APP_NAME', true),
                $amqpConnection,
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
        'userService' => static function(){
            /**
             * @var Queue
             */
            $queue = Instance::ensure('userServiceQueue', Queue::class);

            return new UserService($queue);
        }
    ],
];
