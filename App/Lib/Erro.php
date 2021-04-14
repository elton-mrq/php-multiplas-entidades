<?php

namespace App\Lib;

use Exception;

class Erro {
    
    private $message;
    private $code;
    
    public function __construct($objException = Exception::class) {
        $this->code         = $objException->getCode();
        $this->message      = $objException->getMessage();
    }
    
    public function render(){
        
        $varMsg = $this->message;
        
        if(file_exists(PATH . '/App/Views/erro/'.$this->code.'.php')){
            require_once PATH . '/App/Views/layout/header.php';           
            require_once PATH . '/App/Views/erro/' . $this->code . '.php';
            require_once PATH . '/App/Views/layout/footer.php';
        }else{
            require_once PATH . '/App/Views/layout/header.php';
            require_once PATH . '/App/Views/erro/500.php';
            require_once PATH . '/App/Views/layout/footer.php';
        }
        exit;
    }
    
}
