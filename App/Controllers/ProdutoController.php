<?php


namespace App\Controllers;

use App\Models\DAO\ProdutoDAO;
use App\Models\DAO\MarcaDAO;
use App\Models\Entidades\Produto;
use App\Models\Validacao\ProdutoValidador;
use App\Lib\Sessao;

class ProdutoController extends Controller{
    
    public function index(){
        
        $produtoDAO = new ProdutoDAO();
        
        self::setViewParam('listaProdutos', $produtoDAO->listar());
        
        $this->render('produto/index');
        
       Sessao::limpaMensagem();
        
    }
    
    public function cadastro(){
        
        $marca = new MarcaDAO();
        self::setViewParam('listaMarcas', $marca->listar());
        $this->render('/produto/cadastro');
        
        Sessao::limpaErro();
        Sessao::limpaMensagem();
        Sessao::limpaFormulario();
        
    }
    
    public function salvar(){
        
        $produto = new Produto();
        
        if($_POST){
            
            $produto->setNome($_POST['nome']);
            $produto->setPreco($_POST['preco']);
            $produto->setQuantidade($_POST['quantidade']);
            $produto->setDescricao($_POST['descricao']);
            $produto->getMarca()->setId($_POST['marca_id']);
            
            Sessao::gravaFormulario($_POST);
            
            $produtoValidator = new ProdutoValidador();
            $resultadoValidacao = $produtoValidator->validar($produto);
            
            if($resultadoValidacao->getErros()){
                Sessao::gravaErro($resultadoValidacao->getErros());
                $this->redirect('/produto/cadastro');
            }
            
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->salvar($produto);
            
            Sessao::limpaErro();
            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
            
            $this->redirect('/produto');
        }
        
    }
    
    public function edicao($params){
        
        $id = $params[0];        
            
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getById($id);
        
        if(!$produto){
            Sessao::gravaMensagem('Produto Inexistente.');
            $this->redirect('/produto');
        }
        
        $marcaDAO = new MarcaDAO();
        self::setViewParam('listaMarcas', $marcaDAO->listar());
        self::setViewParam('produto', $produto);
        
        $this->render('/produto/editar');
        
        Sessao::limpaMensagem(); 
        
    }
    
    public function atualizar(){
        
        $produto = new Produto();
        
        if(isset($_POST)){
            
            $produto->setId($_POST['id']);
            $produto->setNome($_POST['nome']);
            $produto->setPreco($_POST['preco']);
            $produto->setQuantidade($_POST['quantidade']);
            $produto->setDescricao($_POST['descricao']);
            $produto->getMarca()->setId($_POST['marca_id']);
            
            Sessao::gravaFormulario($_POST);
            
            $produtoValidator = new ProdutoValidador();
            $resultadoValidacao = $produtoValidator->validar($produto);
            
            if($resultadoValidacao->getErros()){
                Sessao::gravaErro($resultadoValidacao->getErros());
                $this->redirect('/produto/edicao/'.$_POST['id']);
            }
            
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->atualizar($produto);
            
            Sessao::limpaErro();
            Sessao::limpaMensagem();
            Sessao::limpaFormulario();
            
            $this->redirect('/produto');
            
        }
        
    }
    
    public function exclusao($param){
        
        $id = $param[0];
        
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getById($id);
        
        if(!$produto){
            Sessao::gravaMensagem('Produto inexistente!');
            $this->redirect('/produto');
        }
        
        self::setViewParam('produto', $produto);
        $this->render('/produto/exclusao');
        
        Sessao::limpaMensagem();       
        
    }
    
    public function excluir(){
        
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            
            $produto = new Produto();
            $produto->setId($id);
            
            $produtoDAO = new ProdutoDAO();
            
            if(!$produtoDAO->excluir($produto)){
                Sessao::gravaMensagem('Produto inexistente!');
                $this->redirect('/produto');
            }
            
            Sessao::gravaMensagem('Produto excluído com sucesso!');
            $this->redirect('/produto');
            
        }
        
    }
}
