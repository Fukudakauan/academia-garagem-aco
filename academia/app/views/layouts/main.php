<?php

declare(strict_types=1);

$appName = (string) app_config('app_name');
$user = $_SESSION['auth'] ?? [];
$role = (string) ($user['role'] ?? '');
$financeRoles = ['SUPER_ADMIN', 'ADMIN', 'FINANCE'];
$adminRoles = ['SUPER_ADMIN', 'ADMIN'];
$currentRoute = trim((string) ($path ?? ''), '/');

$navGroups = [
    [
        'label' => 'Visão geral',
        'items' => [
            ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'dashboard'],
        ],
    ],
    [
        'label' => 'Gestão acadêmica',
        'items' => [
            ['route' => 'alunos', 'label' => 'Alunos', 'icon' => 'users'],
            ['route' => 'modalidades', 'label' => 'Modalidades', 'icon' => 'dumbbell'],
            ['route' => 'turmas', 'label' => 'Aulas particulares', 'icon' => 'calendar'],
            ['route' => 'graduacoes', 'label' => 'Graduações', 'icon' => 'award'],
            ['route' => 'professores', 'label' => 'Professores', 'icon' => 'user-round'],
        ],
    ],
    [
        'label' => 'Operação',
        'items' => [
            ['route' => 'frequencia', 'label' => 'Frequência', 'icon' => 'clipboard'],
            ['route' => 'checkin', 'label' => 'Check-in', 'icon' => 'qr'],
            ['route' => 'biometria', 'label' => 'Biometria', 'icon' => 'fingerprint'],
        ],
    ],
];

if (in_array($role, $financeRoles, true)) {
    $navGroups[] = [
        'label' => 'Financeiro',
        'items' => [
            ['route' => 'financeiro', 'label' => 'Financeiro', 'icon' => 'wallet'],
        ],
    ];
}

if (in_array($role, $adminRoles, true)) {
    $navGroups[] = [
        'label' => 'Administração',
        'items' => [
            ['route' => 'promocoes', 'label' => 'Promoções', 'icon' => 'tag'],
            ['route' => 'usuarios', 'label' => 'Usuários', 'icon' => 'users'],
            ['route' => 'configuracoes', 'label' => 'Configurações', 'icon' => 'settings'],
        ],
    ];
}

$currentTitle = 'Dashboard';
foreach ($navGroups as $group) {
    foreach ($group['items'] as $item) {
        if ($currentRoute === $item['route'] || str_starts_with($currentRoute, $item['route'] . '/')) {
            $currentTitle = $item['label'];
        }
    }
}

$userName = (string) ($user['name'] ?? 'Usuário');
$userInitial = strtoupper(substr($userName, 0, 1));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? e($title) . ' — ' : ''; ?><?php echo e($appName); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
</head>
<body class="app-body">
    <div class="app-shell" data-app-shell>
        <button class="sidebar-backdrop" type="button" data-sidebar-close aria-label="Fechar menu"></button>

        <aside class="sidebar" data-sidebar aria-label="Navegação principal">
            <div>
                <div class="sidebar-brand-row">
                    <a class="sidebar-brand" href="<?php echo e(url('/dashboard')); ?>" aria-label="<?php echo e($appName); ?> — dashboard">
                        <span class="sidebar-brand-mark"><img src="<?php echo e(asset('/assets/logo-garagem-aco.png')); ?>" alt="" width="29" height="29"></span>
                    </a>
                    <button class="sidebar-close icon-button" type="button" data-sidebar-close aria-label="Fechar menu">
                        <?php echo icon('close'); ?>
                    </button>
                </div>

                <div class="sidebar-kicker">Painel de gestão</div>

                <nav class="sidebar-nav">
                    <?php foreach ($navGroups as $group): ?>
                        <div class="nav-group">
                            <div class="nav-group-label"><?php echo e($group['label']); ?></div>
                            <?php foreach ($group['items'] as $item): ?>
                                <?php $isActive = $currentRoute === $item['route'] || str_starts_with($currentRoute, $item['route'] . '/'); ?>
                                <a class="nav-link<?php echo $isActive ? ' is-active' : ''; ?>" href="<?php echo e(url('/' . $item['route'])); ?>"<?php echo $isActive ? ' aria-current="page"' : ''; ?>>
                                    <?php echo icon($item['icon'], 'icon nav-link-icon'); ?>
                                    <span><?php echo e($item['label']); ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </nav>
            </div>

            <div class="sidebar-footer">
                <div class="sidebar-user">
                    <span class="avatar" aria-hidden="true"><?php echo e($userInitial); ?></span>
                    <span class="sidebar-user-copy"><strong><?php echo e($userName); ?></strong><small><?php echo e(str_replace('_', ' ', $role)); ?></small></span>
                </div>
                <form method="post" action="<?php echo e(url('/logout')); ?>">
                    <input type="hidden" name="_csrf" value="<?php echo e(\Academia\Core\Csrf::token()); ?>">
                    <button type="submit" class="logout-button">
                        <?php echo icon('log-out', 'icon'); ?>
                        <span>Sair da conta</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="content">
            <header class="topbar">
                <div class="topbar-leading">
                    <button class="menu-trigger icon-button" type="button" data-sidebar-open aria-label="Abrir menu">
                        <?php echo icon('menu'); ?>
                    </button>
                    <div>
                        <p class="topbar-kicker">Garagem Aço <span>/</span> Área restrita</p>
                        <h1 class="topbar-title"><?php echo e($currentTitle); ?></h1>
                    </div>
                </div>
                <div class="topbar-user">
                    <span class="status-dot"></span>
                    <span>Operação online</span>
                </div>
            </header>

            <div class="content-inner">
                <?php echo $content ?? ''; ?>
            </div>
        </main>
    </div>

    <script>
        (() => {
            const shell = document.querySelector('[data-app-shell]');
            if (!shell) return;

            const openButton = shell.querySelector('[data-sidebar-open]');
            const closeButtons = shell.querySelectorAll('[data-sidebar-close]');
            const navLinks = shell.querySelectorAll('.nav-link');

            const closeMenu = () => shell.classList.remove('sidebar-is-open');
            openButton?.addEventListener('click', () => shell.classList.add('sidebar-is-open'));
            closeButtons.forEach((button) => button.addEventListener('click', closeMenu));
            navLinks.forEach((link) => link.addEventListener('click', closeMenu));
        })();
    </script>
</body>
</html>
