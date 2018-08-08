<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PessoaDao
 *
 * @author janio
 */
class PessoaDao {

    public function delete($dados) {        
        $query = "DELETE FROM pessoa WHERE id_pessoa = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $dados['id_pessoa']);
        $stmt->execute();
        
    }

    public function editar($dados) {

        $query = "UPDATE pessoa SET nome = :nome, cpf = :cpf, rg = :rg, endereco = :endereco, bairro = :bairro, telefone = :telefone, "
                . " email = :email WHERE id_pessoa = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $dados['id_pessoa']);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':cpf', $dados['cpf']);
        $stmt->bindValue(':rg', $dados['rg']);
        $stmt->bindValue(':endereco', $dados['endereco']);
        $stmt->bindValue(':bairro', $dados['bairro']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->execute();
    }

    public function carregar($dados) {

        $query = "SELECT * FROM pessoa WHERE id_pessoa = :id";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $dados['id_pessoa']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }

    public function buscar($dados) {

        $nome = $dados['nome'];
        $query = "SELECT * FROM pessoa WHERE nome LIKE :nome";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':nome', '%' . $nome . '%');
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }

    public function buscarNaoUsada($dados) {
        $nome = $dados['nome'];
        $query = "SELECT * FROM pessoa WHERE nome LIKE :nome";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':nome', '%' . $nome . '%');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function inserir($dados) {
        
        $query = "INSERT INTO pessoa (nome, cpf, rg, endereco, bairro, telefone, email) "
                . " VALUES (:nome, :cpf, :rg, :endereco, :bairro, :telefone, :email)";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':cpf', $dados['cpf']);
        $stmt->bindValue(':rg', $dados['rg']);
        $stmt->bindValue(':endereco', $dados['endereco']);
        $stmt->bindValue(':bairro', $dados['bairro']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->execute();
    }

    public function listar() {

        $query = "SELECT * FROM pessoa";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function participante($id) {
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

    public function listarParticipantes() {
        $query = "SELECT * FROM pessoa, cota WHERE pessoa.id_pessoa = cota.id_pessoa";
        $con = Conexao::pegaConexao();
        $resultado = $con->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function buscarPorCpf($dados) {
        $query = "SELECT * FROM pessoa WHERE cpf = :cpf";
        $con = Conexao::pegaConexao();
        $stmt = $con->prepare($query);
        $stmt->bindValue(':cpf', $dados);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $resultado) {
            return $resultado;
        }
    }

}
