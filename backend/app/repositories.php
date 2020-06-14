<?php
declare(strict_types=1);

use App\Domain\Banca\BancaRepository;
use App\Domain\Orgao\OrgaoRepository;
use App\Domain\ProgramaEstudos\ProgramaEstudosRepository;
use App\Infrastructure\Persistence\Banca\BancaRepositoryDb;
use App\Infrastructure\Persistence\Orgao\OrgaoRepositoryDb;
use App\Infrastructure\Persistence\ProgramaEstudos\ProgramaEstudosRepositoryDb;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        ProgramaEstudosRepository::class => \DI\autowire(ProgramaEstudosRepositoryDb::class),
        OrgaoRepository::class => \DI\autowire(OrgaoRepositoryDb::class),
        BancaRepository::class => \DI\autowire(BancaRepositoryDb::class),
    ]);
};
