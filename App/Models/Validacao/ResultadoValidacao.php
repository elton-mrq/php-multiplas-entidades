<?php

namespace App\Models\Validacao;

class ResultadoValidacao {
    
    private $erros = [];
    
    public function addErro($campo, $mensagem){
        return $this->erros[$campo] = $mensagem;
    }
    
    public function getErros(){
        return $this->erros;
    }
    
}
