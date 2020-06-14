<?php
declare(strict_types=1);

namespace App\Application\Actions\ProgramaEstudos;

use App\Application\Actions\ActionException;
use Psr\Http\Message\ResponseInterface as Response;

class InsertProgramaEstudosAction extends ProgramaEstudosAction
{
    /**
     * {@inheritdoc}
     * @throws ActionException
     */
    protected function action(): Response
    {
        $params = $this->getFormData();

        $this->validateRequired($params, 'orgao_id');
        $this->validateInt($params, 'orgao_id');

        $this->validateRequired($params, 'banca_id');
        $this->validateInt($params, 'banca_id');

        $this->repository->insert($params);

        return $this->respondWithData();
    }
}
