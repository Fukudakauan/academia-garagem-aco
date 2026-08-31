<?php
$content = ob_get_clean();
ob_start();
?>
<div class="page-header"><h1>Configurações</h1></div>
<?php if (!empty($error)): ?><div class="alert alert-error"><?php echo e($error); ?></div><?php endif; ?>
<?php if ($message = flash('success')): ?><div class="alert alert-success"><?php echo e($message); ?></div><?php endif; ?>
<form method="post">
    <input type="hidden" name="_csrf" value="<?php echo e(\Academia\Core\Csrf::token()); ?>">
    <label>Nome da academia<input name="nome_academia" required value="<?php echo e($settings['nome_academia'] ?? ''); ?>"></label>
    <label>CNPJ<input name="cnpj" value="<?php echo e($settings['cnpj'] ?? ''); ?>"></label>
    <label>Telefone<input name="telefone" value="<?php echo e($settings['telefone'] ?? ''); ?>"></label>
    <label>E-mail<input type="email" name="email" value="<?php echo e($settings['email'] ?? ''); ?>"></label>
    <label>Endereço<textarea name="endereco"><?php echo e($settings['endereco'] ?? ''); ?></textarea></label>
    <label>Logo (URL ou caminho autorizado)<input name="logo" value="<?php echo e($settings['logo'] ?? ''); ?>"></label>
    <label>Dias de tolerância financeira<input type="number" min="0" max="90" name="dias_tolerancia_financeira" value="<?php echo e($settings['dias_tolerancia_financeira'] ?? 5); ?>"></label>
    <label>Dia padrão de vencimento<input type="number" min="1" max="31" name="dia_padrao_vencimento" value="<?php echo e($settings['dia_padrao_vencimento'] ?? 10); ?>"></label>
    <label>Moeda<input name="moeda" value="<?php echo e($settings['moeda'] ?? 'BRL'); ?>" readonly></label>
    <label>Timezone<input name="timezone" value="<?php echo e($settings['timezone'] ?? 'America/Sao_Paulo'); ?>"></label>
    <label>Expiração de sessão (segundos)<input type="number" min="300" name="tempo_expiracao_sessao" value="<?php echo e($settings['tempo_expiracao_sessao'] ?? 7200); ?>"></label>
    <label>Máximo de tentativas de login<input type="number" min="3" max="20" name="max_tentativas_login" value="<?php echo e($settings['max_tentativas_login'] ?? 5); ?>"></label>
    <label><input type="checkbox" name="permitir_bloqueio_inadimplencia" <?php echo !empty($settings['permitir_bloqueio_inadimplencia']) ? 'checked' : ''; ?>> Permitir bloqueio por inadimplência</label>
    <div class="form-actions"><button class="btn btn-primary">Salvar</button></div>
</form>
<?php $content = ob_get_clean(); include __DIR__ . '/../layouts/main.php';
