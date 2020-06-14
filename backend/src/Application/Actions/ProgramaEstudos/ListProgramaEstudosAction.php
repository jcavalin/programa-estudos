<?php
declare(strict_types=1);

namespace App\Application\Actions\ProgramaEstudos;

use Psr\Http\Message\ResponseInterface as Response;

class ListProgramaEstudosAction extends ProgramaEstudosAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $users = $this->repository->findAll();

        return $this->respondWithData($users);
    }
}
