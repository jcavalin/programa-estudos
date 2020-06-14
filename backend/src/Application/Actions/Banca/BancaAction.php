<?php
declare(strict_types=1);

namespace App\Application\Actions\Banca;

use App\Application\Actions\Action;
use App\Domain\Banca\BancaRepository;
use PDO;
use Psr\Log\LoggerInterface;

abstract class BancaAction extends Action
{
    public function __construct(LoggerInterface $logger, BancaRepository $repository, PDO $pdo)
    {
        $logger->info('BancaAction inicializada');
        $this->repository = $repository;
        $this->repository->setPDO($pdo);
    }
}
