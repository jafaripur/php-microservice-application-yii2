<?php

declare(strict_types=1);

return yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/config.php',
    require __DIR__ . '/test_components.php'
);
