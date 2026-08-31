<?php

declare(strict_types=1);

$content = ob_get_clean();
ob_start();
?>
<div class="page-header">
    <div>
        <span class="eyebrow">Controle de acesso</span>
        <h1>Biometria</h1>
        <p>Prepare a integração dos equipamentos de entrada.</p>
    </div>
</div>

<section class="panel" aria-labelledby="biometric-title">
    <div class="panel-heading">
        <div>
            <h2 id="biometric-title">Integração pendente</h2>
            <p>A tela ficará pronta para o SDK ou API do fabricante escolhido.</p>
        </div>
        <?php echo icon('fingerprint'); ?>
    </div>
    <div class="empty-state">
        <?php echo icon('fingerprint'); ?>
        <div>
            <strong>Nenhum equipamento conectado</strong>
            <p>A definição do fornecedor libera o cadastro e os eventos de entrada.</p>
        </div>
    </div>
    <div class="quick-links">
        <div class="quick-link"><span class="badge">01</span><span>Equipamentos cadastrados</span></div>
        <div class="quick-link"><span class="badge">02</span><span>Log de entradas</span></div>
        <div class="quick-link"><span class="badge">03</span><span>Bloqueio automático</span></div>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
