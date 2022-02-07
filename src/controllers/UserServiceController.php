<?php

declare(strict_types=1);

namespace Micro\controllers;

use Micro\override\BaseController;

class UserServiceController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'listen' => \Micro\controllers\actions\userService\Listen::class,
            'send-test' => \Micro\controllers\actions\userService\SendTest::class,
        ];
    }
}
