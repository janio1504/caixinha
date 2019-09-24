<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BibliotecaDao
 *
 * @author janio
 */
class BibliotecaDao {
    public function getPessoaAcademico($dados){
        
        $sql = "select id_pessoa, cpf_cnpj, nome, valido from comum.pessoa where cpf_cnpj = :cpf";
        $con = ConSigaa::pegaConexaoSigaa();
        $st = $con->prepare($sql);
        $st->bindValue(":cpf", $dados['cpf']);
        $st->execute();
        $servidor = $st->fetchAll();
        foreach ($servidor as $s){
            return $s;
        }
    }
    
    public function getPessoaComum($dados){
        
        $sql = "select valido from comum.pessoa where cpf_cnpj = :cpf";
        $con = ConSigComum::pegaConexaoSigComum();
        $st = $con->prepare($sql);
        $st->bindValue(":cpf", $dados['cpf']);
        $st->execute();
        $servidor = $st->fetchAll();
        foreach ($servidor as $s){
            return $s;
        }
    }
    
    public function discenteValidoSigaa($dados){   
        
        $sql = "update comum.pessoa set valido = true where cpf_cnpj = :cpf";
        $con = ConSigaa::pegaConexaoSigaa();
        
        $con->beginTransaction();
        $st = $con->prepare($sql);
        $st->bindValue(":cpf", $dados['cpf']);        
        $stmt = $st->execute();
        
        if(!$stmt){
            $con->rollBack();
            throw new Exception("Erro ao gravar validação no banco!");
        }else{
            $con->commit();
        }
        
    }
    
    public function discenteValidoComum($dados){
        $sql = "update comum.pessoa set valido = true where cpf_cnpj = :cpf";
        $con = ConSigComum::pegaConexaoSigComum();        
        $st = $con->prepare($sql);
        $st->bindValue(":cpf", $dados['cpf']);
        $st->execute();
    }
}
