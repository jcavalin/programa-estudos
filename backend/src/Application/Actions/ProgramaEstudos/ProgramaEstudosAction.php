<?php
declare(strict_types=1);

namespace App\Application\Actions\ProgramaEstudos;

use App\Application\Actions\Action;
use App\Domain\ProgramaEstudos\ProgramaEstudosRepository;
use PDO;
use Psr\Log\LoggerInterface;

abstract class ProgramaEstudosAction extends Action
{
    public function __construct(LoggerInterface $logger, ProgramaEstudosRepository $repository, PDO $pdo)
    {
        $logger->info('ProgramaEstudosAction inicializada');
        $this->repository = $repository;
        $this->repository->setPDO($pdo);
    }
}
