<?php $content = ob_get_clean(); ob_start(); ?>
<div class="page-header">
    <div>
        <span class="eyebrow">Entrada da academia</span>
        <h1>Check-in</h1>
        <p>Valide rapidamente o acesso de um aluno.</p>
    </div>
</div>

<section class="panel" aria-labelledby="checkin-title">
    <div class="panel-heading">
        <div>
            <h2 id="checkin-title">Validar entrada</h2>
            <p>Busque por nome, matrícula ou CPF.</p>
        </div>
        <?php echo icon('qr'); ?>
    </div>
    <form method="post" class="form-card" autocomplete="off">
        <input type="hidden" name="_csrf" value="<?php echo e(\Academia\Core\Csrf::token()); ?>">
        <label for="identificador">Nome, matrícula ou CPF
            <input id="identificador" name="identificador" value="<?php echo e($query ?? ''); ?>" autofocus required placeholder="Digite para buscar o aluno">
        </label>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">
                <?php echo icon('check-circle'); ?>
                <span>Validar entrada</span>
            </button>
        </div>
    </form>
</section>

<?php if ($result): ?>
    <section class="panel <?php echo $result['allowed'] ? 'access-allowed' : 'access-blocked'; ?>" role="status">
        <div class="panel-heading">
            <div>
                <h2><?php echo e($result['title']); ?></h2>
                <p><?php echo e($result['message']); ?></p>
            </div>
            <?php echo icon($result['allowed'] ? 'check-circle' : 'alert'); ?>
        </div>
    </section>
<?php endif; ?>
<?php $content = ob_get_clean(); include __DIR__ . '/../layouts/main.php'; ?>
