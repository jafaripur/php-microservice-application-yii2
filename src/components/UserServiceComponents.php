<?php

declare(strict_types=1);

namespace Micro\components;

use Araz\MicroService\Queue;
use Araz\Service\User\UserService;
use yii\base\Component;
use yii\di\Instance;

final class UserServiceComponents extends Component
{
    /**
     *
     * @var string
     */
    public $queueName;

    private UserService $userService;

    public function init()
    {
        parent::init();
        $this->userService = new UserService(Instance::ensure($this->queueName, Queue::class));
    }

    public function getUserService(): UserService
    {
        return $this->userService;
    }
}
