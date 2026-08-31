<?php
declare(strict_types=1);
namespace Academia\Repositories;
use PDO;
final class CheckinRepository {
    public function __construct(private readonly PDO $pdo) {}
    /** @return array<string,mixed>|null */
    public function findByIdentifier(string $value): ?array {
        $sql = "SELECT a.*, m.id matricula_id, m.situacao matricula_situacao, b.status mensalidade_status, b.data_vencimento
            FROM alunos a LEFT JOIN LATERAL (SELECT * FROM matriculas WHERE aluno_id=a.id ORDER BY (situacao='ATIVA') DESC, data_inicio DESC LIMIT 1) m ON TRUE
            LEFT JOIN LATERAL (SELECT * FROM mensalidades WHERE matricula_id=m.id ORDER BY data_vencimento DESC LIMIT 1) b ON TRUE
            WHERE a.deleted_at IS NULL AND (LOWER(a.nome)=LOWER(:value) OR a.matricula_codigo=:value OR a.cpf=:value) ORDER BY a.nome LIMIT 1";
        $st=$this->pdo->prepare($sql); $st->execute(['value'=>$value]); $row=$st->fetch(); return is_array($row)?$row:null;
    }
    public function register(int $studentId, ?int $enrollmentId, int $userId): void {
        $st=$this->pdo->prepare("INSERT INTO frequencias (aluno_id, modalidade_id, data, hora_entrada, origem, registrado_por_usuario_id) SELECT :aluno_id, modalidade_id, CURRENT_DATE, CURRENT_TIME, 'WEB', :usuario_id FROM matriculas WHERE id=:matricula_id");
        if ($enrollmentId !== null) { $st->execute(['aluno_id'=>$studentId,'usuario_id'=>$userId,'matricula_id'=>$enrollmentId]); }
    }
}
