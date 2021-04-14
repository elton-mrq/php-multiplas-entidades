<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Marca;
use App\Models\DAO\MarcaDAO;
use App\Models\Validacao\MarcaValidador;

class MarcaController extends Controller{
    
    public function index(){
        
        $dao = new MarcaDAO();
        
        self::setViewParam('listaMarcas', $dao->listar());
        
        $this->render('marca/index');
        
    }
    
    public function cadastro(){        

        $this->render('marca/cadastro');   
                        
        Sessao::limpaErro();
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        
    }
    
    public function salvar(){
        
        $marca = new Marca();
        
        if($_POST){
            
            $marca->setNome($_POST['nome']);
            
            Sessao::gravaFormulario($_POST);
            
            $marcaValidador = new MarcaValidador();
            $resultadoValidacao = $marcaValidador->validar($marca);
            
            if($resultadoValidacao->getErros()){
                Sessao::gravaErro($resultadoValidacao->getErros());
                $this->redirect('/marca/cadastro');
            }
            
            $marcaDAO = new MarcaDAO();
            $marcaDAO->salvar($marca);
            
            Sessao::limpaErro();
            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
            
            $this->redirect('/marca');
        }
        
    }
    
    public function edicao($params){
        
        $id = $params[0];
        
        $marcaDAO = new MarcaDAO();
        $marca = $marcaDAO->listar($id);
        
        if(!$marca){
            Sessao::gravaMensagem('Marca inexistente!');
            $this->redirect('/marca');
        }
        
        self::setViewParam('marca', $marca);
        $this->render('/marca/editar');

        Sessao::limpaMensagem();
        
    }
    
    public function atualizar(){
        
        $marca = new Marca();
        
        if(isset($_POST)){
            
            $marca->setId($_POST['id']);
            $marca->setNome($_POST['nome']);
            
            Sessao::gravaFormulario($_POST);
            
            $marcaValidator = new MarcaValidador();
            $resultadoValidacao = $marcaValidator->validar($marca);
            
            if($resultadoValidacao->getErros()){
                Sessao::gravaErro($resultadoValidacao->getErros());
                $this->redirect('/marca');
            }
            
            $marcaDAO = new MarcaDAO();
            $marcaDAO->atualizar($marca);
            
            Sessao::limpaErro();
            Sessao::limpaMensagem();
            Sessao::limpaFormulario();
            
            $this->redirect('/marca');
            
        }
    }
           
    public function exclusao($params){
        
        $id = $params[0];
        
        $marcaDAO = new MarcaDAO();
        $marca = $marcaDAO->listar($id);
        
        if(!$marca){
            Sessao::gravaMensagem('Marca Inexistente!');
            $this->redirect('/marca');
        }
        
        self::setViewParam('marca', $marca);
        $this->render('/marca/exclusao');
        
       Sessao::limpaMensagem();
        
    }
    
    public function excluir(){
        
        if(isset($_POST['id'])){
            
            $id = $_POST['id'];
            
            $marca = new Marca();
            $marca->setId($id);
            
            $marcaDAO = new MarcaDAO();      
            
            if($qtdProdutos = $marcaDAO->getQtdProdutos($id)){
                Sessao::gravaMensagem('Esta marca não pode ser excluída pois existem: ' . $qtdProdutos . ' produtos vinculados a ela');
                $this->redirect('/marca/exclusao/' . $id);
            }            
                       
            if(!$marcaDAO->excluir($marca)){
                Sessao::gravaMensagem('Marca inexistente!');
                $this->redirect('/marca');
            }
            
            Sessao::gravaMensagem('Marca excluída com sucesso!');
            $this->redirect('/marca');
            
        }
        
    }
}
