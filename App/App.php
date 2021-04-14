<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\ProdutoController;
use Exception;

class App {
    
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public $controllerName;
    
    public function __construct() {
        $this->url();
    }
    
    public function run(){
        
        if($this->controller){            
            $this->controllerName = ucwords($this->controller) . 'Controller';
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', "", $this->controllerName);            
        }else{
            $this->controllerName = 'HomeController';
        }
        
        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', "", $this->action);
        
        if(!$this->controller){
            $this->controller = new HomeController($this);
            $this->controller->index();
        }
        
        if(!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)){
            throw new Exception('Página não encontrada.', 404);
        }
        
        $nomeClasse = 'App\\Controllers\\' . $this->controllerName;
        $objController = new $nomeClasse($this);
        
                
        if(!class_exists($nomeClasse)){
            throw new Exception('Erro na aplicação', 500);
        }
        
        if(method_exists($objController, $this->action)){
            
            $objController->{$this->action}($this->params);
            
        }else if(!$this->action && method_exists($objController, 'index')){
            
            $objController->index($this->params);
            return;
            
        }else{
            
            throw new Exception('Nosso suporte já esta verificando desculpe!', 500);
            
        }
        
        //throw new Exception('Página não encontrada', 404);

    }
    
    private function url(){

        if(isset($_GET['url'])){
            $path = $_GET['url'];
            $path = rtrim($path, "/");
            $path = filter_var($path, FILTER_SANITIZE_URL);
            
            $path = explode('/', $path);
                     
            $this->controller       = $this->verificaArray($path, 0);
            $this->action           = $this->verificaArray($path, 1);
            
                                    
            if($this->verificaArray($path, 2)){
                unset($path[0]);
                unset($path[1]);
                $this->params = array_values($path);
            }
            
        }
        
    }
    
    private function verificaArray($array, $key){
       
        if(isset($array[$key]) && !empty($array[$key])){
            return $array[$key];
        }
        return null;
    }
    
    function getController() {
        return $this->controller;
    }

    function getControllerFile() {
        return $this->controllerFile;
    }

    function getAction() {
        return $this->action;
    }

    function getParams() {
        return $this->params;
    }

    function getControllerName() {
        return $this->controllerName;
    }
    
}
