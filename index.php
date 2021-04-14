<?php

use App\App;
use App\Lib\Erro;
use App\Lib\Conexao;

require_once ('vendor/autoload.php');
require_once ('Config/config.php');

session_start();

error_reporting(E_ALL & ~E_NOTICE);

try {
    
    $app = new App();
    $app->run();
    
} catch (Exception $exc) {
    
    $objErro = new Erro($exc);
    $objErro->render();
    
}



