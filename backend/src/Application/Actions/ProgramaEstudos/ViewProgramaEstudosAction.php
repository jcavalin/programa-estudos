<?php
declare(strict_types=1);

namespace App\Application\Actions\ProgramaEstudos;

use App\Domain\DomainException\DomainException;
use Psr\Http\Message\ResponseInterface as Response;

class ViewProgramaEstudosAction extends ProgramaEstudosAction
{
    /**
     * {@inheritdoc}
     * @throws DomainException
     */
    protected function action(): Response
    {
        $id = (int)$this->resolveArg('id');
        $result = $this->repository->byId($id);
        return $this->respondWithData($result);
    }
}
