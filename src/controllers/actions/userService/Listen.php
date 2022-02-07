<?php

declare(strict_types=1);

namespace Micro\controllers\actions\userService;

use Micro\override\BaseAction;
use yii\console\ExitCode;
use Yii;

class Listen extends BaseAction
{
    public function run(array $consumers = []): int
    {
        Yii::$app->userServiceQueue->getConsumer()->consume(0, $consumers);

        return ExitCode::OK;
    }
}
