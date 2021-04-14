<?php

namespace App\Lib;

use PDO;
use PDOException;
use Exception;

class Conexao {
    
    private static $connection;


    public function __construct() {
        
    }
    
    public static function getConnection(){
        
        $config = DB_DRIVER . ':host=' . DB_HOST . '; dbname=' . DB_NAME;
        
        try {
            
            if(!isset($connection)){
                $connection = new PDO($config, DB_USER, DB_PASS);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $exc) {
            
            throw new Exception('Erro de conexão com o banco de dados', 500);
        
        }
            
    }
    
}
