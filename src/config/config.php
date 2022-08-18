<?php

declare(strict_types=1);

$psrLogger = new \Monolog\Logger(getenv('APP_NAME', true), [
    new \Monolog\Handler\StreamHandler('php://stdout', YII_DEBUG ? \Monolog\Logger::DEBUG : \Monolog\Logger::INFO),
], [], new \DateTimeZone('UTC'));

if (!YII_DEBUG) {
    if (getenv('SENTRY_DSN', true)) {
        $client = \Sentry\ClientBuilder::create(['dsn' => getenv('SENTRY_DSN', true)])->getClient();
        $psrLogger->pushHandler(new \Sentry\Monolog\Handler(new \Sentry\State\Hub($client)));
    }
}

return yii\helpers\ArrayHelper::merge([
    'id' => getenv('APP_NAME', true),
    'timeZone' => 'UTC',
    'language' => 'en',
    'basePath' => Yii::getAlias('@Micro'),
    'vendorPath' => Yii::getAlias('@micro/vendor'),
    'runtimePath' => Yii::getAlias('@micro/runtime'),
    'controllerNamespace' => 'Micro\controllers',
    'bootstrap' => ['log'],
    /*'controllerMap' => [
        'fixture' => [
            'class' => yii\console\controllers\FixtureController::class,
            'namespace' => 'Micro\fixtures',
          ],
    ],*/
    'components' => [
        'log' => [
            'class' => yii\log\Dispatcher::class,
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'flushInterval' => 1,
            'targets' => [
                'psr3' => [
                    'class' => \samdark\log\PsrTarget::class,
                    'logger' => $psrLogger,

                    // It is optional parameter. The message levels that this target is interested in.
                    // The parameter can be an array.
                    'levels' => ['info', yii\log\Logger::LEVEL_WARNING, Psr\Log\LogLevel::CRITICAL, Psr\Log\LogLevel::ERROR],
                    // It is optional parameter. Default value is false. If you use Yii log buffering, you see buffer write time, and not real timestamp.
                    // If you want write real time to logs, you can set addTimestampToContext as true and use timestamp from log event context.
                    'addTimestampToContext' => true,
                    'logVars' => [],
                ],
            ],
        ],
    ],
], require __DIR__ . '/components.php');
