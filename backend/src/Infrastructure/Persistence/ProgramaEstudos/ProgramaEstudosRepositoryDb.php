<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\ProgramaEstudos;

use App\Domain\Domain;
use App\Domain\ProgramaEstudos\ProgramaEstudosRepository;
use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;

class ProgramaEstudosRepositoryDb implements ProgramaEstudosRepository
{
    /**
     * @var User[]
     */
    private $users;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $this->users = $users ?? [
            1 => new User(1, 'bill.gates', 'Bill', 'Gates'),
            2 => new User(2, 'steve.jobs', 'Steve', 'Jobs'),
            3 => new User(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg'),
            4 => new User(4, 'evan.spiegel', 'Evan', 'Spiegel'),
            5 => new User(5, 'jack.dorsey', 'Jack', 'Dorsey'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->users);
    }

    public function byId(int $id): Domain
    {
        if (!isset($this->users[$id])) {
            throw new UserNotFoundException();
        }

        return $this->users[$id];
    }

    public function insert(array $data): Domain
    {
        // TODO: Implement insert() method.
    }

    public function update(int $id, array $data): Domain
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
