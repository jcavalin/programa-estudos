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
        $sql = "SELECT * FROM programa_estudos WHERE id = :id";
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
                    VALUES (:orgao_id, :banca_id);";

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
                WHERE id = :id;";

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
                WHERE id = :id;";

        $this->execute($sql, ['id' => $id]);
    }
}
