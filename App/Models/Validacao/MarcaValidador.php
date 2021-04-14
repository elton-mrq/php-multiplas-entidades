<?php


namespace App\Models\Validacao;

use App\Models\Entidades\Marca;
use App\Models\Validacao\ResultadoValidacao;

class MarcaValidador {
    
    public function validar(Marca $marca){
        
        $resultadoValidacao = new ResultadoValidacao();
        
        if(empty($marca->getNome())){
            $resultadoValidacao->addErro('nome', 'Nome: Este campo não pode ser vazio!');
            echo '<br><br><br> Entrou no erro';
        }
        
        return $resultadoValidacao;
        
    }

}
