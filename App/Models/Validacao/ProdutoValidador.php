<?php

namespace App\Models\Validacao;

use App\Models\Entidades\Produto;
use App\Models\Validacao\ResultadoValidacao;

class ProdutoValidador {
    
    public function validar(Produto $produto){
        
        $resultadoValidacao = new ResultadoValidacao();
        
        if(empty($produto->getNome())){
            $resultadoValidacao->addErro('nome', 'Nome: Este campo não pode ser vazio!<br>');
        }
        
        if(empty($produto->getPreco())){
            $resultadoValidacao->addErro('preco', "Preço: Este campo não pode ser vazio!<br>");
        }
        
        if(empty($produto->getQuantidade())){
            $resultadoValidacao->addErro('quantidade', 'Quantidade: Este campo não ser vazio!<br>');
        }
        
        if(empty($produto->getDescricao())){
            $resultadoValidacao->addErro('descricao', 'Descrição: Este campo não pode ser vazio!<br>');
        }
        
        if(empty($produto->getMarca()->getId())){
            $resultadoValidacao->addErro('marca_id', 'Marca: Este campo não pode ser vazio!<br>');
        }
        
        return $resultadoValidacao;
        
    }
    
}
