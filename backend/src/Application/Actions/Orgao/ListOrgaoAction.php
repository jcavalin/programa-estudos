<?php
declare(strict_types=1);

namespace App\Application\Actions\Orgao;

use Psr\Http\Message\ResponseInterface as Response;

class ListOrgaoAction extends OrgaoAction
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
