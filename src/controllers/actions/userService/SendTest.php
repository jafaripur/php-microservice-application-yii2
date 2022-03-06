<?php

declare(strict_types=1);

namespace Micro\controllers\actions\userService;

use Micro\override\BaseAction;
use yii\console\ExitCode;
use Yii;
use yii\helpers\Console;

class SendTest extends BaseAction
{
    public function run(): int
    {
        Console::output("Sending async command to UserService::getUserInformation()");
        $userAsyncCommands = Yii::$app->userService->commands()->async(5000)
            ->getUserInformation(['id' => '123'], 'cor-test-1234', 2000)
            ->getUserInformation(['id' => '123'], 'cor-test-1235', 2000)
            ->getUserInformation(['id' => '123'], 'cor-test-1236', 2000);

        Console::output("Sending command to CommandSender::getUserInformation()\n");
        $result = Yii::$app->userService->commands()->getUserInformation(['id' => '123']);
        Console::output(print_r($result, true) . "\n\n");

        Console::output("Sending emit to EmitSender::userLoggedIn()\n");
        $msgId = Yii::$app->userService->emits()->userLoggedIn(['id' => '123']);
        Console::output(sprintf('Emit message ID: %s', $msgId));


        Console::output(sprintf("Sending topic to TopicSender::userLoggedIn() with routing key: %s", Yii::$app->userService->topics()->getRoutingKeyUserTopicCreate()));
        $msgId = Yii::$app->userService->topics()->userChanged(Yii::$app->userService->topics()->getRoutingKeyUserTopicCreate(), ['id' => '123']);
        Console::output(sprintf('Topic message ID: %s', $msgId));

        Console::output(sprintf("Sending topic to TopicSender::userLoggedIn() with routing key: %s", Yii::$app->userService->topics()->getRoutingKeyUserTopicUpdate()));
        $msgId = Yii::$app->userService->topics()->userChanged(Yii::$app->userService->topics()->getRoutingKeyUserTopicUpdate(), ['id' => '123']);
        Console::output(sprintf('Topic message ID: %s', $msgId));


        Console::output("Sending worker to WorkerSender::userProfileAnalysis()");
        $msgId = Yii::$app->userService->workers()->userProfileAnalysis(['id' => '123']);
        Console::output(sprintf('Worker message ID: %s', $msgId));

        Console::output("Sending worker to WorkerSender::userProfileUpdateNotification()");
        $msgId = Yii::$app->userService->workers()->userProfileUpdateNotification(['id' => '1234']);
        Console::output(sprintf('Worker message ID: %s', $msgId));

        Console::output("Receiving async command from UserService::getUserInformation ...");
        foreach ($userAsyncCommands->receive() as $correlationId => $data) {
            Console::output(print_r([$correlationId => $data], true));
        }

        return ExitCode::OK;
    }
}
