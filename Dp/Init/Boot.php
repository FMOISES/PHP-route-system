<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dp\Init;

/**
 * Description of Boot
 *
 * @author moise
 */
abstract class Boot {

    private $routes;
    
    abstract protected function InitRoute();

    public function __construct() {
        $this->InitRoute();
        // inicia o array de rotas  contido em $this->InitRoute();
        $this->run($this->GetUrl());
    }

    public function getRoutes() {
        return $this->routes;
        // retorna o array de rotas
    }

    public function setRoutes(array $routes) {
        $this->routes = $routes;
        // recebe as rotas de InitRoute() e as armazena no atributo private $routes;
    }

    protected function run($url) {
        //recebe url e testa atual e verifica qual o Controlador a ser chamado e qual o Metodo
        $erro = false;
        foreach ($this->routes as $rota) {
            if ($rota['route'] == $url) {
                $erro = true;

                $class = 'App\\Controllers\\' . ucfirst($rota['controller']);
                $action = ucfirst($rota['action']);
                $obj = new $class;
                $obj->$action();
            }
        }
    }

    protected function GetUrl() {
        $url = $_SERVER['REQUEST_URI'];
        return parse_url($url, PHP_URL_PATH);
        // retorna qual a URL do arquivo em execução
    }

}
