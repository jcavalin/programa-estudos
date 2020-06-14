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
                    pe.excluido IS FALSE";

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
     * @return array|void
     */
    public function insert(array $data)
    {
        $sql = "INSERT INTO programa_estudos (orgao_id, banca_id) 
                    VALUES (:orgao_id, :banca_id)";

        $this->execute($sql, [
            'orgao_id' => $data['orgao_id'],
            'banca_id' => $data['banca_id']
        ]);
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
                    COUNT(q.id) AS questoes
                FROM
                    programa_estudos pe
                INNER JOIN
                    questao q ON pe.banca_id = q.banca_id
                             AND pe.orgao_id = q.orgao_id
                             AND q.excluido IS FALSE
                INNER JOIN
                    (WITH RECURSIVE cte (id, assunto, pai_id, root_id) AS (
                        SELECT
                            pai.id,
                            pai.assunto,
                            pai.pai_id,
                            pai.id AS root_id
                        FROM
                            assunto pai
                        WHERE
                            pai.excluido IS FALSE
                        UNION ALL
                        SELECT
                            filho.id,
                            filho.assunto,
                            filho.pai_id,
                            cte.root_id
                        FROM
                            assunto filho
                        INNER JOIN
                            cte ON filho.pai_id = cte.id
                        WHERE
                            filho.excluido IS FALSE
                    )
                    SELECT * FROM cte) a ON q.assunto_id = a.root_id
                WHERE
                        pe.id = :id
                GROUP BY
                    a.id, a.assunto
                ORDER BY
                    a.assunto";

        return $this->fetchAll($sql, ['id' => $id]);
    }
}
