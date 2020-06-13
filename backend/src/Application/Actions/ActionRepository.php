<?php
declare(strict_types=1);

namespace App\Application\Actions;

use App\Domain\Repository;

abstract class ActionRepository extends Action
{
    /**
     * @var Repository
     */
    protected $repository;

    public function __construct(Repository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
}
