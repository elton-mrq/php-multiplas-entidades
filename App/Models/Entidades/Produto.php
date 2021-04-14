<?php


namespace App\Models\Entidades;
use DateTime;

class Produto {
    
    private $id;
    private $nome;
    private $preco;
    private $quantidade;
    private $descricao;
    private $dataCadastro;
    private $marca;
    
    public function __construct() {
        $this->marca = new Marca();
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPreco() {
        return $this->preco;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDataCadastro() {
        return new DataTime($this->dataCadastro);
    }

    function getMarca() {
        return $this->marca;
    }
    
    function getMarcaId(){
        return $this->marca_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setMarcaId($marca_id) {
        $this->marca = $marca_id;
    }


    
}
