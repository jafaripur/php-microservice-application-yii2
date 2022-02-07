<?php

declare(strict_types=1);

namespace Micro\queue\processor\user\worker;

use Micro\queue\processor\user\UserWorker;

final class UserProfileAnalysisWorker extends UserWorker
{
    public function execute(mixed $body): void
    {
    }

    public function getJobName(): string
    {
        return 'user_profile_analysis';
    }
}
