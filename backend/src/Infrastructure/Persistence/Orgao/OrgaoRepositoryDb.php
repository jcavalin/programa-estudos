<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Orgao;

use App\Domain\Orgao\OrgaoRepository;
use App\Infrastructure\Persistence\NotImplementedException;

class OrgaoRepositoryDb extends OrgaoRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $sql = "SELECT 
                    o.id,
                    o.nome
                FROM 
                    orgao o
                WHERE 
                    o.excluido IS FALSE";

        return $this->fetchAll($sql);
    }

    /**
     * @param int $id
     * @return array
     * @throws NotImplementedException
     */
    public function byId(int $id): array
    {
        throw new NotImplementedException();
    }

    /**
     * @param array $data
     * @return array|void
     * @throws NotImplementedException
     */
    public function insert(array $data)
    {
        throw new NotImplementedException();
    }

    /**
     * @param int $id
     * @param array $data
     * @return array|void
     * @throws NotImplementedException
     */
    public function update(int $id, array $data)
    {
        throw new NotImplementedException();
    }

    /**
     * @param int $id
     * @throws NotImplementedException
     */
    public function delete(int $id)
    {
        throw new NotImplementedException();
    }
}
