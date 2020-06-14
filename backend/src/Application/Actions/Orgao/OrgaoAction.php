<?php
declare(strict_types=1);

namespace App\Application\Actions\Orgao;

use App\Application\Actions\Action;
use App\Domain\Orgao\OrgaoRepository;
use PDO;
use Psr\Log\LoggerInterface;

abstract class OrgaoAction extends Action
{
    public function __construct(LoggerInterface $logger, OrgaoRepository $repository, PDO $pdo)
    {
        $logger->info('OrgaoAction inicializada');
        $this->repository = $repository;
        $this->repository->setPDO($pdo);
    }
}
