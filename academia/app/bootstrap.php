<?php

declare(strict_types=1);

use Academia\Core\Env;
use Academia\Core\ErrorHandler;
use Academia\Core\SessionManager;
use Academia\Core\Url;

$projectRoot = dirname(__DIR__);

$composerAutoload = $projectRoot . '/vendor/autoload.php';
if (is_file($composerAutoload)) {
    require_once $composerAutoload;
}

spl_autoload_register(static function (string $class) use ($projectRoot): void {
    if (str_starts_with($class, 'Academia\\')) {
        $file = $projectRoot . '/app/' . str_replace('\\', '/', substr($class, strlen('Academia\\'))) . '.php';
        if (is_file($file)) {
            require_once $file;
        }

        return;
    }

    $legacy = ['BaseModel', 'Aluno', 'Modalidade', 'Turma', 'Graduacao', 'Frequencia', 'Usuario', 'Mensalidade', 'Plano', 'Matricula', 'Promocao', 'Professor'];
    if (in_array($class, $legacy, true)) {
        $file = $projectRoot . '/app/models/' . $class . '.php';
        if (is_file($file)) {
            require_once $file;
        }
    }
});

Env::load($projectRoot . '/.env');
$appConfig = require $projectRoot . '/app/config/app.php';
$dbConfig = require $projectRoot . '/app/config/database.php';

require_once $projectRoot . '/app/helpers.php';
$GLOBALS['app_config'] = $appConfig;
$GLOBALS['url_generator'] = new Url((string) $appConfig['url']);

date_default_timezone_set((string) $appConfig['timezone']);
ErrorHandler::register($appConfig);
SessionManager::start($appConfig);

$dsn = sprintf('%s:host=%s;port=%d;dbname=%s', $dbConfig['driver'], $dbConfig['host'], $dbConfig['port'], $dbConfig['database']);
$pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['options']);
$pdo->prepare("SELECT set_config('TimeZone', :timezone, false)")->execute(['timezone' => $appConfig['timezone']]);
