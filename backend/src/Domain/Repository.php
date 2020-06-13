<?php
declare(strict_types=1);

namespace App\Domain;

use App\Domain\DomainException\DomainException;

interface Repository
{
    /**
     * @return Domain[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Domain
     * @throws DomainException
     */
    public function byId(int $id): Domain;

    /**
     * @param array $data
     * @return Domain
     * @throws DomainException
     */
    public function insert(array $data): Domain;

    /**
     * @param int $id
     * @param array $data
     * @return Domain
     */
    public function update(int $id, array $data): Domain;

    /**
     * @param int $id
     * @throws DomainException
     */
    public function delete(int $id);
}
