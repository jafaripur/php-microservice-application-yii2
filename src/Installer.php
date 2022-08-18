<?php

declare(strict_types=1);

namespace Micro;

use FilesystemIterator as FSIterator;
use RecursiveDirectoryIterator as DirIterator;
use RecursiveIteratorIterator as RIterator;

final class Installer
{
    public static function postUpdate(): void
    {
        self::chmodRecursive('runtime', 0o777);
    }

    public static function copyEnvFile(): void
    {
        if (!file_exists('.env')) {
            copy('.env_sample', '.env');
        }

        if (!file_exists('.env_test')) {
            copy('.env_sample', '.env_test');
        }

        if (!file_exists('.env_dev')) {
            copy('.env_sample', '.env_dev');
        }

        if (!file_exists('src/config/components.php')) {
            copy('src/config/components_sample.php', 'src/config/components.php');
        }

        if (!file_exists('src/config/test_components.php')) {
            copy('src/config/test_components_sample.php', 'src/config/test_components.php');
        }
    }

    private static function chmodRecursive(string $path, int $mode): void
    {
        chmod($path, $mode);
        $iterator = new RIterator(
            new DirIterator($path, FSIterator::SKIP_DOTS | FSIterator::CURRENT_AS_PATHNAME),
            RIterator::SELF_FIRST
        );

        /**
         * @var string $item
         */
        foreach ($iterator as $item) {
            chmod($item, $mode);
        }
    }
}
