<?php
declare(strict_types=1);

namespace App\Application\Actions\ProgramaEstudos;

use Psr\Http\Message\ResponseInterface as Response;

class AssuntosProgramaEstudosAction extends ProgramaEstudosAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = (int)$this->resolveArg('id');
        $rs = $this->repository->assuntos($id);

        return $this->respondWithData($rs);
    }
}
