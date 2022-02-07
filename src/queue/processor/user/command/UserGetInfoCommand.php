<?php

declare(strict_types=1);

namespace Micro\queue\processor\user\command;

use Micro\queue\processor\user\UserCommand;

final class UserGetInfoCommand extends UserCommand
{
    public function execute(mixed $body): mixed
    {
        return [
            'id' => 123,
            'name' => 'Test',
        ];
    }

    public function getJobName(): string
    {
        return 'get_profile_info';
    }
}
