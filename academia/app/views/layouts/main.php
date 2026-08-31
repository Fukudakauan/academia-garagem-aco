<?php

declare(strict_types=1);

$appName = (string) app_config('app_name');
$user = $_SESSION['auth'] ?? [];
$role = (string) ($user['role'] ?? '');
$financeRoles = ['SUPER_ADMIN', 'ADMIN', 'FINANCE'];
$adminRoles = ['SUPER_ADMIN', 'ADMIN'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? e($title) . ' — ' : ''; ?><?php echo e($appName); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
</head>
<body>
    <aside class="sidebar">
        <div>
            <div class="brand"><?php echo e($appName); ?></div>
            <nav>
                <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
                <a href="<?php echo e(url('/alunos')); ?>">Alunos</a>
                <a href="<?php echo e(url('/modalidades')); ?>">Modalidades</a>
                <a href="<?php echo e(url('/turmas')); ?>">Turmas</a>
                <a href="<?php echo e(url('/graduacoes')); ?>">Graduações</a>
                <a href="<?php echo e(url('/professores')); ?>">Professores</a>
                <a href="<?php echo e(url('/frequencia')); ?>">Frequência</a>
                <a href="<?php echo e(url('/biometria')); ?>">Biometria</a>
                <?php if (in_array($role, $financeRoles, true)): ?><a href="<?php echo e(url('/financeiro')); ?>">Financeiro</a><?php endif; ?>
                <?php if (in_array($role, $adminRoles, true)): ?>
                    <a href="<?php echo e(url('/promocoes')); ?>">Promoções</a>
                    <a href="<?php echo e(url('/usuarios')); ?>">Usuários</a>
                <?php endif; ?>
            </nav>
        </div>
        <div class="sidebar-footer">
            <div class="user-info"><?php echo e($user['name'] ?? ''); ?><br><small><?php echo e($role); ?></small></div>
            <form method="post" action="<?php echo e(url('/logout')); ?>">
                <input type="hidden" name="_csrf" value="<?php echo e(\Academia\Core\Csrf::token()); ?>">
                <button type="submit" class="link-button logout">Sair</button>
            </form>
        </div>
    </aside>
    <main class="content"><?php echo $content ?? ''; ?></main>
</body>
</html>
