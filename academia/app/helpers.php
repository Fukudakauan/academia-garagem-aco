<?php

declare(strict_types=1);

use Academia\Core\ErrorHandler;
use Academia\Core\HttpException;
use Academia\Core\Url;

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function app_config(?string $key = null, mixed $default = null): mixed
{
    $config = $GLOBALS['app_config'] ?? [];
    if ($key === null) {
        return $config;
    }

    return $config[$key] ?? $default;
}

function url(string $path = '/'): string
{
    /** @var Url $url */
    $url = $GLOBALS['url_generator'];

    return $url->to($path);
}

function asset(string $path): string
{
    /** @var Url $url */
    $url = $GLOBALS['url_generator'];

    return $url->asset($path);
}

function redirect(string $path, int $status = 302): never
{
    header('Location: ' . url($path), true, $status);
    exit;
}

function abort(int $status, string $message = ''): never
{
    ErrorHandler::render(new HttpException($status, $message));
}

function flash(string $key, ?string $message = null): ?string
{
    if ($message !== null) {
        $_SESSION['_flash'][$key] = $message;

        return null;
    }

    $value = $_SESSION['_flash'][$key] ?? null;
    unset($_SESSION['_flash'][$key]);

    return is_string($value) ? $value : null;
}
