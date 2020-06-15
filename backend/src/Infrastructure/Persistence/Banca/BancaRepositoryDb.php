<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Banca;

use App\Domain\Banca\BancaRepository;
use App\Infrastructure\Persistence\NotImplementedException;

class BancaRepositoryDb extends BancaRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $sql = "SELECT 
                    b.id,
                    b.nome
                FROM 
                    banca b
                WHERE 
                    b.excluido IS FALSE";

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
