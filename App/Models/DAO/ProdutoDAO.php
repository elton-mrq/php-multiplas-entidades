<?php

namespace App\Models\DAO;

use App\Models\Entidades\Produto;

class ProdutoDAO extends BaseDAO {
    
    public function getById($id){
        
        echo $id; 
        
        $resultado = $this->select(
                "SELECT p.id as idProduto,
                        p.nome as nomeProduto,
                        p.preco,
                        p.quantidade,
                        p.descricao,
                        m.id as idMarca,
                        m.nome as nomeMarca
                FROM produto as p
                INNER JOIN marca as m ON p.marca_id = m.id
                WHERE p.id = $id");
        
        $dataSet = $resultado->fetch();
        
        if($dataSet){
            
            $produto = new Produto();
            $produto->setId($dataSet['idProduto']);
            $produto->setNome($dataSet['nomeProduto']);
            $produto->setPreco($dataSet['preco']);
            $produto->setQuantidade($dataSet['quantidade']);
            $produto->setDescricao($dataSet['descricao']);
            $produto->getMarca()->setId($dataSet['idMarca']);
            $produto->getMarca()->setNome($dataSet['nomeMarca']); 
    
            return $produto;
            
        }
        
        return false;
        
    }


    public function listar(){
        
        $resultado = $this->select(
                'SELECT p.id as idProduto,
                        p.nome as nomeProduto,
                        p.preco,
                        m.nome as nomeMarca
                        FROM produto as p
                INNER JOIN marca as m ON p.marca_id = m.id'
                );
        $dataSet = $resultado->fetchAll();
        
        if($dataSet){
            
            $listaProdutos = [];
            
            foreach ($dataSet as $dataSetProduto){
                $produto = new Produto();
                $produto->setId($dataSetProduto['idProduto']);
                $produto->setNome($dataSetProduto['nomeProduto']);
                $produto->setPreco($dataSetProduto['preco']);
                $produto->getMarca()->setNome($dataSetProduto['nomeMarca']);
                
                $listaProdutos[] = $produto;
            }
            
            return $listaProdutos;
            
        }
        return false;
    }
    
    public function salvar(Produto $produto){
        
        try {
            
            $nome           = $produto->getNome();
            $preco          = $produto->getPreco();
            $quantidade     = $produto->getQuantidade();
            $descricao      = $produto->getDescricao();
            $marca_id       = $produto->getMarca()->getId();
            
            return $this->insert('produto', 
                    ':nome, :preco, :quantidade, :descricao, :marca_id', 
                    [
                        'nome'          => $nome,
                        'preco'         => $preco,
                        'quantidade'    => $quantidade,
                        'descricao'     => $descricao,
                        'marca_id'      => $marca_id
                    ]);
            
        } catch (Exception $exc) {
            throw new Exception("Erro na gravação de dados!", 500);
        }
            
    }
    
    public function atualizar(Produto $produto){
        
        try {
            
            $id             = $produto->getId();
            $nome           = $produto->getNome();
            $preco          = $produto->getPreco();
            $quantidade     = $produto->getQuantidade();
            $descricao      = $produto->getDescricao();
            $marca_id       = $produto->getMarca()->getId();
            
            return $this->update(
                    'produto', 
                    'nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, marca_id = :marca_id', 
                    [
                        ':id'           => $id,
                        ':nome'         => $nome,
                        ':preco'        => $preco,
                        ':quantidade'   => $quantidade,
                        ':descricao'    => $descricao,
                        ':marca_id'     => $marca_id
                    ],
                    'id = :id');
            
        } catch (Exception $exc) {
            throw new Exception('Erro ao efetuar a operação de atualização', 500);
        }
            
    }
    
    public function excluir(Produto $produto){
        
        try {
            
            $id = $produto->getId();
            
            return $this->delete('produto', "id = $id");
            
        } catch (Exception $ex) {
            throw new Exception('Erro ao excluir', 500);
        }
        
    }
    
}
