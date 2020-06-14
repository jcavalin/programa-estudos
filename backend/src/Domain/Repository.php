<?php
declare(strict_types=1);

namespace App\Domain;

use PDO;
use PDOStatement;

abstract class Repository
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * @param PDO $pdo
     */
    public function setPDO(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool|PDOStatement
     */
    protected function execute(string $sql, array $params = []): PDOStatement
    {
        $stm = $this->pdo->prepare($sql);
        $stm->execute($params);

        return $stm;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array
     */
    protected function fetchAll(string $sql, array $params = []): array
    {
        return $this->execute($sql, $params)->fetchAll(\PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array
     */
    protected function fetch(string $sql, array $params = []): array
    {
        return $this->execute($sql, $params)->fetch(\PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @return array
     */
    public abstract function findAll(): array;

    /**
     * @param int $id
     * @return array
     */
    public abstract function byId(int $id): array;

    /**
     * @param array $data
     * @return array
     */
    public abstract function insert(array $data);

    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public abstract function update(int $id, array $data);

    /**
     * @param int $id
     */
    public abstract function delete(int $id);
}
