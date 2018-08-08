<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmprestimoDao
 *
 * @author janio
 */
class EmprestimoDao {

    public function delete($id) {
        $query = "DELETE FORM emprestimo WHERE id_emprestimo = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function editar($dados) {
       
        $query = "UPDATE emprestimo SET valor = :valor, data_inicio = :data_inicio, data_fim = :data_fim, status = :status WHERE id_emprestimo = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $dados['id_emprestimo']);
        $stmt->bindValue(':valor', $dados['valor']);        
        $stmt->bindValue(':data_inicio', $dados['data_inicio']); 
        $stmt->bindValue(':data_fim', $dados['data_fim']);
        $stmt->bindValue(':status', $dados['status']);
        
        $stmt->execute();
    }

    public function carregar($id) {
        $query = "SELECT * FROM emprestimo WHERE id_emprestimo = :id";
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
        $query = "INSERT INTO emprestimo (valor, data_inicio, id_pessoa) "
                . " VALUES (:valor, :data_inicio, :id_pessoa)";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':valor', $dados['valor']);
        $stmt->bindValue(':data_inicio', $dados['data_inicio']);
        $stmt->bindValue(':id_pessoa', $dados['id_pessoa']);
        //$stmt->bindValue(':status', $dados['status']);
        $stmt->execute();
    }

    public function listar() {
        
        $query = "SELECT * FROM emprestimo a, pessoa b WHERE a.id_pessoa = b.id_pessoa";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();        
        return $lista;
    }

    public function emprestimoParticipante($id) {
        
        $query = "SELECT * FROM pessoa, emprestimo WHERE pessoa.id_pessoa = :id and emprestimo.id_pessoa = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }

    public function buscarEmprestimo($dados) {
        $query = "SELECT * FROM pessoa a, emprestimo b WHERE a.nome LIKE :nome AND a.id_pessoa = b.id_pessoa ";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':nome', $dados);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }

    public function listarEmpPorPessoa($id) {
        $query = "SELECT * FROM pessoa, emprestimo WHERE pessoa.id_pessoa = :id and emprestimo.id_pessoa = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function pagarEmprestimo($dados) {
        
        $query = "INSERT INTO pg_emprestimo (valor, juros, data, id_emprestimo) "
                . " VALUES (:valor, :juros, :data, :id_emprestimo)";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':valor', $dados['valor']);
        $stmt->bindValue(':juros', $dados['juros']);
        $stmt->bindValue(':data', $dados['data']);
        $stmt->bindValue(':id_emprestimo', $dados['id_emprestimo']);        
        $stmt->execute();
    }
    
    public function listarPagamentosEmprestimo($id) {
        $query = "SELECT * FROM pg_emprestimo WHERE id_emprestimo = :id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();     
             return $result;
       
    }

}
