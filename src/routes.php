<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $container['Principal'] = function($container) use ($app)
    {
        return new \App\controller\Principal($container);
    };

    $app->get('/',Principal::class.":index");
    $app->get('/listar',Principal::class.":listar");
    $app->post('/adicionar',Principal::class.":adicionar");
    $app->post('/editar',Principal::class.":editar");
    $app->post('/excluir',Principal::class.":excluir");


};

