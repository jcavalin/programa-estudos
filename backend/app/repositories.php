<?php
declare(strict_types=1);

use App\Domain\ProgramaEstudos\ProgramaEstudosRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\ProgramaEstudos\ProgramaEstudosRepositoryDb;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        ProgramaEstudosRepository::class => \DI\autowire(ProgramaEstudosRepositoryDb::class),
    ]);
};
