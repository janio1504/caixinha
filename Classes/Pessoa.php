<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author janio
 */
class Pessoa {

    public function inserirPessoa($dados) {
        $pessoaDao = new PessoaDao();
        $pessoa = $pessoaDao->buscarPorCpf($dados['cpf']);
        if (isset($pessoa)) {
            throw new Exception("Já existe um cadastro com esse CPF!");
        }
        $pessoaDao->inserir($dados);
        $msg['sucesso'] = "Cadastro realizado com sucesso!";
        return $msg;
    }

    public function listarPessoa() {
        try {
            $pessoaDao = new PessoaDao();
            $pessoas = $pessoaDao->listar();
            if (!isset($pessoas)) {
                throw new Exception("Não foi possivel listar as pessoas! ");
            }
        } catch (Exception $ex) {
            return json_encode($ex->getMessage());
        }
        return json_encode($pessoas);
    }

    public function carregarPessoa($get = false) {
        $dados['id_pessoa'] = $get['id'];
        $pessoaDao = new PessoaDao();
        $dados = $pessoaDao->carregar($dados);
        return $dados;
    }

    public function editarPessoa($dados) {
        $pessoaDao = new PessoaDao();
        $pessoaDao->editar($dados);
        return $pessoaDao->listar();
    }

    public function excluirPessoa($get) {
        //Erro::mostraErro($get);
        try {
            $dados = array();
            $dados['id_pessoa'] = $get['id'];
            $pessoaDao = new PessoaDao();
            $cotaDao = new CotaDao();
            $cota = $cotaDao->cotaParticipante($dados['id_pessoa']);
            if (isset($cota)) {
                throw new Exception("A pessoa possui cota e não pode ser excluida!");
            }
            $pessoaDao->delete($dados);
            $resp = json_encode("Exclusão realizada com sucesso!");
            echo $resp; exit();
            
        } catch (Exception $ex) {
             echo $ex->getMessage();
             exit();
        }
    }

    public function carregarParticipante($id) {
        $pessoaDao = new PessoaDao();
        $dados = $pessoaDao->participante($id);
        return $dados;
    }

    public function buscarPessoa($nome) {

        $pessoaDao = new PessoaDao();
        $dados = $pessoaDao->buscar($nome);
        if (!isset($dados)) {
            throw new Exception("Nenhuma pessoa encontrada!");
        }
        return $dados;
    }

    public function listarParticipantes() {
        $pessoaDao = new PessoaDao();
        $dados = $pessoaDao->listarParticipantes();
        return $dados;
    }

}
