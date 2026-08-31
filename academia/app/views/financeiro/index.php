<?php

declare(strict_types=1);

$content = ob_get_clean();
ob_start();
?>
<div class="page-header">
    <div>
        <span class="eyebrow">Controle financeiro</span>
        <h1>Financeiro</h1>
        <p>Organize mensalidades, pagamentos e futuras integrações.</p>
    </div>
</div>

<section class="panel" aria-labelledby="finance-flows-title">
    <div class="panel-heading">
        <div>
            <h2 id="finance-flows-title">Fluxos financeiros</h2>
            <p>Os recursos ficam organizados para a rotina da equipe.</p>
        </div>
        <?php echo icon('wallet'); ?>
    </div>
    <div class="quick-links">
        <div class="quick-link">
            <?php echo icon('calendar'); ?>
            <span>Mensalidades</span>
            <span class="badge">Em breve</span>
        </div>
        <div class="quick-link">
            <?php echo icon('check-circle'); ?>
            <span>Pagamentos</span>
            <span class="badge">Em breve</span>
        </div>
        <div class="quick-link">
            <?php echo icon('qr'); ?>
            <span>Integração PIX</span>
            <span class="badge">Em breve</span>
        </div>
    </div>
    <p class="hint panel-note">A integração bancária e PIX será implementada posteriormente com os códigos e credenciais do provedor.</p>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
