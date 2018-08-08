<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CotaDao
 *
 * @author janio
 */
class CotaDao {

    public function delete($id) {        
        $query = "DELETE FORM cota WHERE id_cota = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function editar($dados) {
        
        $query = "UPDATE cota SET valor = :valor, quantidade = :quantidade WHERE id_cota = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $dados['id_cota']);
        $stmt->bindValue(':valor', $dados['valor']);
        $stmt->bindValue(':quantidade', $dados['quantidade']);
        //$stmt->bindValue(':id_pessoa', $dados['id_pessoa']);
        //$stmt->bindValue(':data_inclusao', $dados['']);
        $stmt->execute();
    }

    public function carregar($id) {
        $query = "SELECT * FROM cota WHERE id_cota = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }
    
    public function inserir($dados) {

        $query = "INSERT INTO cota (valor, quantidade, id_pessoa, data_inclusao) "
                . " VALUES (:valor, :quantidade, :id_pessoa, :data_inclusao)";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':valor', $dados['valor']);
        $stmt->bindValue(':quantidade', $dados['quantidade']);
        $stmt->bindValue(':id_pessoa', $dados['id_pessoa']);
        $stmt->bindValue(':data_inclusao', date('Y-m-d'));
        $stmt->execute();
    }

    public function listar() {
        $query = "SELECT * FROM cota, pessoa WHERE cota.id_pessoa = pessoa.id_pessoa";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cotaParticipante($id) {
        $query = "SELECT * FROM pessoa, cota WHERE pessoa.id_pessoa = :id and cota.id_pessoa = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }
    
    public function pagamentoCota($dados){
        $query = "INSERT INTO pagamento_cota (valor, juros, data, id_cota) "
                . " VALUES (:valor, :juros, :data, :id_cota)";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':valor', $dados['valor']);
        $stmt->bindValue(':juros', $dados['juros']);
        $stmt->bindValue(':data', $dados['data']);
        $stmt->bindValue(':id_cota', $dados['id_cota']);
        $stmt->execute(); 
    }
    
    public function editarPagamentoCota($dados){
        $query = "UPDATE  pagamento_cota SET valor = :valor, juros = :juros, data = :data, id_cota = :id_cota ";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':valor', $dados['valor']);
        $stmt->bindValue(':juros', $dados['juros']);
        $stmt->bindValue(':data', $dados['data']);
        $stmt->bindValue(':id_cota', $dados['id_cota']);
        $stmt->execute(); 
    }
    
    public function listarPagamentoCota(){
        $query = "SELECT * FROM pagamento_cota";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    
    public function carregarPagamentoCota($id) {
        $query = "SELECT * FROM cota, pagamento_cota WHERE cota.id_cota = :id and pagamento_cota.id_cota = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }

}
