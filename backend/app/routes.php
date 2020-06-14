<?php
declare(strict_types=1);

use App\Application\Actions\ProgramaEstudos\AssuntosProgramaEstudosAction;
use App\Application\Actions\ProgramaEstudos\DeleteProgramaEstudosAction;
use App\Application\Actions\ProgramaEstudos\InsertProgramaEstudosAction;
use App\Application\Actions\ProgramaEstudos\ListProgramaEstudosAction;
use App\Application\Actions\ProgramaEstudos\GetProgramaEstudosAction;
use App\Application\Actions\ProgramaEstudos\UpdateProgramaEstudosAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Programa de estudos.');
        return $response;
    });

    $app->group('/programas-estudos', function (Group $group) {
        $group->get('', ListProgramaEstudosAction::class);
        $group->get('/{id}', GetProgramaEstudosAction::class);
        $group->get('/{id}/assuntos', AssuntosProgramaEstudosAction::class);
        $group->post('', InsertProgramaEstudosAction::class);
        $group->put('/{id}', UpdateProgramaEstudosAction::class);
        $group->delete('/{id}', DeleteProgramaEstudosAction::class);
    });
};
