<?php $content=ob_get_clean(); ob_start(); ?>
<div class="page-header"><h1>Check-in</h1></div><form method="post"><input type="hidden" name="_csrf" value="<?php echo e(\Academia\Core\Csrf::token()); ?>"><label>Nome, matrícula ou CPF<input name="identificador" value="<?php echo e($query??''); ?>" autofocus required></label><button class="btn btn-primary">Validar entrada</button></form>
<?php if($result): ?><div class="panel <?php echo $result['allowed']?'access-allowed':'access-blocked'; ?>"><h2><?php echo e($result['title']); ?></h2><p><?php echo e($result['message']); ?></p></div><?php endif; ?>
<?php $content=ob_get_clean(); include __DIR__.'/../layouts/main.php';
