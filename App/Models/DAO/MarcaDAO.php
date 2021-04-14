<?php

namespace App\Models\DAO;

use PDO;
use App\Models\Entidades\Marca;

class MarcaDAO extends BaseDAO{
    
    public function listar($id = null){
        
        if(!$id){
            $resultado = $this->select(
                    "SELECT * FROM marca"
                    );
           
            return $resultado->fetchAll(PDO::FETCH_CLASS, Marca::class);
            
        } else{
            
            $resultado = $this->select(
                    "SELECT * FROM marca WHERE id = $id"
                    );
            return $resultado->fetchObject(Marca::class);
        }
         return false;
    }
    
    public function salvar(Marca $marca){
      
        try {
            
            $nome   = $marca->getNome();
            
            return $this->insert(
                    "marca", 
                    ":nome", 
                    [
                        'nome' => $nome
                    ]);
            
        } catch (Exception $exc) {
            throw new Exception('Erro na gravação de dados!', 500);
        }
            
    }
    
    public function atualizar(Marca $marca){
        
        try {
            
            $id         = $marca->getId();
            $nome       = $marca->getNome();
            
            return $this->update("marca", 
                                "nome = :nome", 
                                [
                                    ':id'       => $id,
                                    ':nome'     => $nome
                                ], 
                                "id = :id"
                    );
            
        } catch (Exception $exc) {
            
            throw new Exception("Erro na atualização de dados", 500);
            
        }
                
    }
    
    public function getQtdProdutos($id){
        
        if($id){
            
            $resultado = $this->select(
                    "SELECT COUNT(*) AS total FROM produto WHERE marca_id = $id"
                    );
            
            return $resultado->fetch()['total'];
            
        }
        
        return false;
        
    }
    
    public function excluir(Marca $marca){
        
        try {
            
            $id = $marca->getId();
            
            return $this->delete('marca', "id = $id");
            
        } catch (Exception $exc) {
            
            throw new Exception('Erro ao excluir!', 500);
        
        }
            
    }
    
}
