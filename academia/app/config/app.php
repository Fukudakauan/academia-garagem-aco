<?php

declare(strict_types=1);

use Academia\Core\Env;

return [
    'app_name' => Env::get('APP_NAME', 'Academia Garagem Aço'),
    'url' => rtrim((string) Env::get('APP_URL', 'http://localhost/academia/public'), '/'),
    'environment' => Env::get('APP_ENV', 'production'),
    'debug' => Env::bool('APP_DEBUG', false),
    'timezone' => Env::get('APP_TIMEZONE', 'America/Sao_Paulo'),
    'locale' => Env::get('APP_LOCALE', 'pt-BR'),
    'upload_max' => 2 * 1024 * 1024,
    'session_name' => Env::get('SESSION_NAME', 'academia_session'),
    'session_lifetime' => Env::int('SESSION_LIFETIME', 7200),
    'login_max_attempts' => Env::int('LOGIN_MAX_ATTEMPTS', 5),
    'login_lockout_seconds' => Env::int('LOGIN_LOCKOUT_SECONDS', 900),
];
