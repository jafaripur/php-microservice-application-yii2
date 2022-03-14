<?php

declare(strict_types=1);

namespace Micro\queue\processor\user\worker;

use Araz\MicroService\Processors\RequestResponse\Request;
use Micro\queue\processor\user\UserWorker;

final class UserProfileAnalysisWorker extends UserWorker
{
    public function execute(Request $request): void
    {
    }

    public function getJobName(): string
    {
        return 'user_profile_analysis';
    }
}
