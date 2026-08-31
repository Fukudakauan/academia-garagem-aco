<?php

declare(strict_types=1);

// Router used only by PHP's built-in development server. Apache/Nginx use
// their own rewrite configuration and continue to target index.php directly.
$uri = (string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/');
$file = __DIR__ . DIRECTORY_SEPARATOR . ltrim($uri, '/');

if (PHP_SAPI === 'cli-server' && is_file($file)) {
    return false;
}

require __DIR__ . '/index.php';
