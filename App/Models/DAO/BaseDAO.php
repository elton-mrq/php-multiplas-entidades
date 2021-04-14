<?php

namespace App\Models\DAO;

use App\Lib\Conexao;

abstract class BaseDAO {
    
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }
    
    public function select($sql){
        
        if(!empty($sql)){
            return $this->conexao->query($sql);
        }
        
    }
    
    public function insert($table, $cols, $values){
        
        if(!empty($table) && !empty($cols) && !empty($values)){
            
            $parametros         = $cols;
            $colunas            = str_replace(":", "", $cols);
            
            $stmt = $this->conexao->prepare("INSERT INTO $table ($colunas) VALUES ($parametros)");
            $stmt->execute($values);
            
            return $stmt->rowCount();
        }else {
            return false;
        }  
        
    }
    
    public function update($table, $cols, $values, $where = null){
        
        if(!empty($table) && !empty($cols) && !empty($values)){
            
            if($where){
                $where = " WHERE $where";
            }
            
            $sql = "UPDATE $table SET $cols $where";
            
            //echo $sql;
            
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute($values);
            
            return $stmt->rowCount();
            
        }
        
        return false;
        
    }
    
    public function delete($table, $where = null){
        
        if(!empty($table)){
            
            if($where){
                $where = "WHERE $where";
            }
            
        }
        
        $sql = "DELETE FROM $table $where ";
       
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        
        return $stmt->rowCount();
        
    }
    
}
