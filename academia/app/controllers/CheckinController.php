<?php
declare(strict_types=1);
use Academia\Repositories\CheckinRepository; use Academia\Repositories\SettingsRepository; use Academia\Services\CheckinAccessService;
final class CheckinController {
    public function __construct(private readonly PDO $pdo) {}
    public function index(): void {
        $result=null; $query='';
        if (($_SERVER['REQUEST_METHOD']??'GET')==='POST') { $query=trim((string)($_POST['identificador']??'')); $student=(new CheckinRepository($this->pdo))->findByIdentifier($query);
            if ($student===null) { $result=['title'=>'BLOQUEADO','message'=>'Aluno não encontrado.','allowed'=>false]; }
            else { $s=(new SettingsRepository($this->pdo))->all(); $d=(new CheckinAccessService())->decide($student['situacao'],$student['matricula_situacao']??'CANCELADA',$student['mensalidade_status']??null,$student['data_vencimento']??null,(int)($s['dias_tolerancia_financeira']??5),(bool)($s['permitir_bloqueio_inadimplencia']??true),new DateTimeImmutable('today'));
                if ($d->allowed) (new CheckinRepository($this->pdo))->register((int)$student['id'], isset($student['matricula_id'])?(int)$student['matricula_id']:null,(int)$_SESSION['auth']['user_id']);
                $result=['title'=>$d->title,'message'=>$d->message,'allowed'=>$d->allowed]; }
        } require __DIR__.'/../views/checkin/index.php'; }
}
