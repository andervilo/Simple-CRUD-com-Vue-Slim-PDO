<?php

use Src\Professor;

// autoloader for Composer
require '../vendor/autoload.php';

//Configurarion
$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ]
];

// instanciate Slim
$app = new Slim\App($config);

// grouping the /api route, see Slim's group() method documentation for more
$app->group('/api', function () use ($app) {
    $this->get('/professor/', function ($request, $response, $args) {
        return $response->withJson(Professor::getAllProfessor());
    });

    $this->get('/professor/{id}', function ($request, $response, $args) {
        $id = $args['id'];
        return $response->withJson(Professor::getProfessorById($id));
    });

    $this->delete('/professor/{id}', function ($request, $response, $args) {
        $id = $args['id'];
        return $response->withJson(Professor::deleteProfessor($id));
    });

    $this->post('/professor/', function ($request, $response, $args) {
        $dados['nome'] = $request->getParams()['nome'];
        $dados['telefone'] = $request->getParams()['telefone'];
        $dados['endereco'] = $request->getParams()['endereco'];
        return $response->withJson(Professor::salvarProfessor($dados));
    });

    $this->put('/professor/', function ($request, $response, $args) {
        $dados['id'] = $request->getParams()['id'];
        $dados['nome'] = $request->getParams()['nome'];
        $dados['telefone'] = $request->getParams()['telefone'];
        $dados['endereco'] = $request->getParams()['endereco'];
        return $response->withJson(Professor::atualizarProfessor($dados));
    });
});

// api route "test" which just gives back some demo data

$app->run();
