<?php
// app/views/professores/index.php
$content = ob_get_clean();
ob_start();
?>
<div class="page-header">
    <h1>Professores</h1>
    <a href="/academia/public/professores/novo" class="btn btn-primary">Novo Professor</a>
</div>

<table class="table">
    <thead>
        <tr><th>Nome</th><th>Email</th><th>Telefone</th><th>CREF</th><th>Ações</th></tr>
    </thead>
    <tbody>
        <?php foreach ($professores as $p): ?>
            <tr>
                <td><?php echo htmlspecialchars($p['nome']); ?></td>
                <td><?php echo htmlspecialchars($p['email'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($p['telefone'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($p['cref'] ?? ''); ?></td>
                <td>
                    <a href="/academia/public/professores/editar/<?php echo (int)$p['id']; ?>">Editar</a>
                    <form method="post" action="<?php echo e(url('/professores/excluir/' . (int) $p['id'])); ?>" class="inline-form" onsubmit="return confirm('Desativar professor?')">
                        <input type="hidden" name="_csrf" value="<?php echo e(\Academia\Core\Csrf::token()); ?>">
                        <button type="submit" class="link-button danger">Desativar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
