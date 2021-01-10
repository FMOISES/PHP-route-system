<?php

namespace App;

use Dp\Init\Boot;

class Route extends Boot {

    protected function InitRoute() {
        //configura as rotas 
        //rotas = indices do array $routes que possue 3 possições 
        //route,controller e action

        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );
        $routes['inxex'] = array(
            'route' => '/index',
            'controller' => 'indexController',
            'action' => 'index'
        );
        $routes['sobre'] = array(
            'route' => '/sobre',
            'controller' => 'indexController',
            'action' => 'sobre'
        );

        //a linha abaixo chama o metodo que insere a configuração das rotas em private $routes;
        $this->setRoutes($routes);
    }


}
