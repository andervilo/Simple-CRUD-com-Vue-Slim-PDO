<?php

// autoloader for Composer
require 'vendor/autoload.php';
require './Professor.php';

// instanciate Slim
$app = new Slim\App();

// basic authentication
$app->add(new \Slim\Middleware\HttpBasicAuthentication(array(
    // everything inside this root path uses the authentication
    "path" => "/api",
    // deactivate HTTPS usage (for simplicity)
    "secure" => false,
    // users (name and password), credentials will be passed via request header, see the client.html for more info
    "users" => [
        "demouser" => "123",
    ],
    "error" => function ($request, $response, $arguments) {
        // return the 401 "unauthorized" status code when auth error occurs
        return $response->withStatus(401);
    }
)));

// grouping the /api route, see Slim's group() method documentation for more
$app->group('/api', function () use ($app) {

    $dataForApi = ['yo', 777];

    // api route "test" which just gives back some demo data
    $app->get('/test', function ($request, $response, $args) use ($dataForApi) {
        return $response->withJson([
            'demoText' => $dataForApi[0], // "yo"
            'demoNumbers' => $dataForApi[1] // "777"
        ]);
    });
});
// api route "test" which just gives back some demo data

    $app->get('/professor/', function ($request, $response, $args){
        return $response->withJson(Professor::getAllProfessor());
    });
    
    $app->get('/professor/{id}', function ($request, $response, $args){
        $id = $args['id'];
        return $response->withJson(Professor::getProfessorById($id));
    });
    
    $app->delete('/professor/{id}', function ($request, $response, $args){
        $id = $args['id'];
        return $response->withJson(Professor::deleteProfessor($id));
    });
    
    $app->post('/professor/', function ($request, $response, $args){
        $dados['nome']     = $request->getParams()['nome'];
        $dados['telefone'] = $request->getParams()['telefone'];
        $dados['endereco'] = $request->getParams()['endereco'];
        return $response->withJson(Professor::salvarProfessor($dados));
    });
    
    $app->put('/professor/', function ($request, $response, $args){
        $dados['id']       = $request->getParams()['id'];
        $dados['nome']     = $request->getParams()['nome'];
        $dados['telefone'] = $request->getParams()['telefone'];
        $dados['endereco'] = $request->getParams()['endereco'];
        return $response->withJson(Professor::atualizarProfessor($dados));
    });

$app->run();
