#!/usr/bin/env php
<?php

declare(strict_types=1);

use Ghostwriter\Tulip\Tulip;

/** @var ?string $_composer_autoload_path */
(static function (string $autoloader): void {
    if (! \file_exists($autoloader)) {
        $message = '[ERROR]Cannot locate "' . $autoloader . '"\n please run "composer install"\n';
        \fwrite(\STDERR, $message);
        exit;
    }

    \set_error_handler(static function (int $severity, string $message, string $file, int $line): never {
        throw new \ErrorException($message, 255, $severity, $file, $line);
    });

    require $autoloader;

    /** #BlackLivesMatter. */
    $exitCode = Tulip::new()->run($_SERVER['argv'] ?? []);

    \restore_error_handler();

    exit($exitCode);
})(
    $_composer_autoload_path ?? \implode(\DIRECTORY_SEPARATOR, [\dirname(__DIR__), 'vendor', 'autoload.php'])
);
