<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\ProgramaEstudos;

use App\Domain\ProgramaEstudos\ProgramaEstudosRepository;
use App\Infrastructure\Persistence\NotFoundException;

class ProgramaEstudosRepositoryDb extends ProgramaEstudosRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $sql = "SELECT 
                    pe.id,
                    b.nome AS banca,
                    o.nome AS orgao
                FROM 
                    programa_estudos pe
                INNER JOIN
                    banca b ON pe.banca_id = b.id
                INNER JOIN
                    orgao o ON pe.orgao_id = o.id
                WHERE 
                    pe.excluido IS FALSE
                ORDER BY 
                    pe.id";

        return $this->fetchAll($sql);
    }

    /**
     * @param int $id
     * @return array
     * @throws NotFoundException
     */
    public function byId(int $id): array
    {
        $sql = "SELECT 
                    pe.id,
                    pe.banca_id,
                    pe.orgao_id,
                    b.nome AS banca,
                    o.nome AS orgao
                FROM 
                    programa_estudos pe
                INNER JOIN
                    banca b ON pe.banca_id = b.id
                INNER JOIN
                    orgao o ON pe.orgao_id = o.id
                WHERE 
                    pe.id = :id
                    AND
                    pe.excluido IS FALSE";
        $rs = $this->fetch($sql, ['id' => $id]);

        if (empty($rs)) {
            throw new NotFoundException("Registro não encontrado.");
        }

        return $rs;
    }

    /**
     * @param array $data
     * @return string
     */
    public function insert(array $data)
    {
        $sql = "INSERT INTO programa_estudos (orgao_id, banca_id) 
                    VALUES (:orgao_id, :banca_id)";

        $this->execute($sql, [
            'orgao_id' => $data['orgao_id'],
            'banca_id' => $data['banca_id']
        ]);

        return $this->pdo->lastInsertId();
    }

    /**
     * @param int $id
     * @param array $data
     * @return array|void
     * @throws NotFoundException
     */
    public function update(int $id, array $data)
    {
        $this->byId($id);

        $sql = "UPDATE programa_estudos SET 
                    orgao_id = :orgao_id, 
                    banca_id = :banca_id 
                WHERE id = :id";

        $this->execute($sql, [
            'id' => $id,
            'orgao_id' => $data['orgao_id'],
            'banca_id' => $data['banca_id']
        ]);
    }

    /**
     * @param int $id
     * @throws NotFoundException
     */
    public function delete(int $id)
    {
        $this->byId($id);

        $sql = "UPDATE programa_estudos SET 
                    excluido = true 
                WHERE id = :id";

        $this->execute($sql, ['id' => $id]);
    }

    /**
     * @param $id
     * @return array
     * @throws NotFoundException
     */
    public function assuntos($id)
    {
        $this->byId($id);

        $sql = "SELECT
                    a.id,
                    a.assunto,
                    a.pai_id,
                    a.grupo,
                    a.nivel,
                    COUNT(DISTINCT q.id) AS questoes
                FROM
                    vw_arvore_assunto a
                LEFT JOIN
                    vw_arvore_assunto afilho ON afilho.grupo LIKE CONCAT(a.grupo, '%')
                INNER JOIN
                    questao q ON (a.id = q.assunto_id OR afilho.id = q.assunto_id)
                             AND q.excluido IS FALSE
                INNER JOIN
                    programa_estudos pe ON q.banca_id = pe.banca_id
                                       AND q.orgao_id = pe.orgao_id
                                       AND pe.excluido IS FALSE
                                       AND pe.id = :id
                GROUP BY
                    a.id,
                    a.assunto,
                    a.pai_id,
                    a.grupo,
                    a.nivel
                ORDER BY
                    a.grupo";

        return $this->fetchAll($sql, ['id' => $id]);
    }
}
