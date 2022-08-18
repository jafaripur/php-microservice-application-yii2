<?php

declare(strict_types=1);

Yii::setAlias('@micro', __DIR__ . '/../../');
Yii::setAlias('@Micro', __DIR__ . '/..');

defined('YII_ENV_TEST') or define('YII_ENV_TEST', false);
defined('YII_ENV_DEV') or define('YII_ENV_DEV', false);
defined('YII_ENV_PROD') or define('YII_ENV_PROD', true);

if (YII_ENV_TEST) {
    (Dotenv\Dotenv::createUnsafeImmutable(Yii::getAlias('@micro/'), ['.env_test']))->load();
} elseif (YII_ENV_DEV) {
    (Dotenv\Dotenv::createUnsafeImmutable(Yii::getAlias('@micro/'), ['.env_dev']))->load();
} elseif (YII_ENV_PROD) {
    (Dotenv\Dotenv::createUnsafeImmutable(Yii::getAlias('@micro/'), ['.env']))->load();
}
