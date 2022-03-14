<?php

declare(strict_types=1);

namespace Micro\queue\processor\user\command;

use Araz\MicroService\Processors\RequestResponse\Request;
use Araz\MicroService\Processors\RequestResponse\Response;
use Micro\queue\processor\user\UserCommand;

final class UserGetInfoCommand extends UserCommand
{
    public function execute(Request $request): Response
    {
        return new Response([
            'id' => 123,
            'name' => 'Test',
        ]);
    }

    public function getJobName(): string
    {
        return 'get_profile_info';
    }
}
