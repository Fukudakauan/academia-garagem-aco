<?php

declare(strict_types=1);

use Academia\Core\Csrf;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar — <?php echo e(app_config('app_name')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
</head>
<body class="auth-page">
    <main class="auth-card">
        <h1><?php echo e(app_config('app_name')); ?></h1>
        <p class="subtitle">Acesse sua área administrativa ou portal do aluno.</p>
        <?php if (!empty($error)): ?><div class="alert alert-error" role="alert"><?php echo e($error); ?></div><?php endif; ?>
        <form method="post" action="<?php echo e(url('/login')); ?>" autocomplete="on">
            <input type="hidden" name="_csrf" value="<?php echo e(Csrf::token()); ?>">
            <label for="email">E-mail<input id="email" type="email" name="email" autocomplete="email" required autofocus></label>
            <label for="senha">Senha<input id="senha" type="password" name="senha" autocomplete="current-password" required></label>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </main>
</body>
</html>
