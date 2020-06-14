<?php
declare(strict_types=1);

namespace App\Application\Actions\ProgramaEstudos;

use Psr\Http\Message\ResponseInterface as Response;

class DeleteProgramaEstudosAction extends ProgramaEstudosAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = (int)$this->resolveArg('id');
        $this->repository->delete($id);
        return $this->respondWithData();
    }
}
