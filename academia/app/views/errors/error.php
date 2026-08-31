<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?> — <?php echo e(app_config('app_name')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
</head>
<body class="auth-page">
    <main class="auth-card" role="alert">
        <h1><?php echo e($title); ?></h1>
        <p><?php echo e($message); ?></p>
        <?php if ($details !== null): ?>
            <pre><?php echo e($details); ?></pre>
        <?php endif; ?>
        <a class="btn btn-primary" href="<?php echo e(url('/')); ?>">Voltar ao início</a>
    </main>
</body>
</html>
