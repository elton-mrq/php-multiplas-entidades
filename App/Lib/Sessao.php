<?php

namespace App\Lib;

class Sessao {
    
    public static function gravaMensagem($mensagem){
        $_SESSION['mensagem'] = $mensagem;
    }
    
    public static function limpaMensagem(){
        unset($_SESSION['mensagem']);
    }
    
    public static function retornaMensagem(){
        return(isset($_SESSION['mensagem'])) ? $_SESSION['mensagem'] : "";
    }
    
    public static function gravaFormulario($form){
        $_SESSION['form'] = $form;
    }
    
    public static function limpaFormulario(){
        unset($_SESSION['form']);
    }
    
    public static function retornaFormulario($key){
        return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
    }
    
    public static function existeFormulario(){
        return (isset($_SESSION['form'])) ? $_SESSION['form'] : "";
    }
    
    public static function gravaErro($erro){
        $_SESSION['erro'] = $erro;
    }
    
    public static function limpaErro(){
        unset($_SESSION['erro']);
    }
    
    public static function retornaErro(){
        return (isset($_SESSION['erro'])) ? $_SESSION['erro'] : "";
    }
    
}
