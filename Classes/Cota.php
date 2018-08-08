<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cota
 *
 * @author janio
 */
class Cota {

    public $id_cota;

    function getId_cota() {
        return $this->id_cota;
    }

    function setId_cota($id_cota) {
        $this->id_cota = $id_cota;
    }

    public function inserirCota($dados) {
        try {
            $idPessoa = $dados['id_pessoa'];
            $cotaDao = new CotaDao();
            $cota = $this->carregarCota($idPessoa);            
            if (isset($cota)) {
                throw new Exception('Já existe cota cadastrada para essa pessoa!');
            }            
            $cotaDao->inserir($dados);            
            echo 'Cota cadastrada com sucesso!';            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listarCota(){
        try {
            $cotaDao = new CotaDao();
            $cotas = $cotaDao->listar();
            if(!isset($cotas)){
                throw new Exception('Não foi possivel listar as cotas! ');
            }
            return $cotas;
            
        } catch (Exception $ex) {
            
        }
    }

    public function carregarCota($get) {

        $cotaDao = new CotaDao();
        $dados = $cotaDao->cotaParticipante($get);

        $dados['total'] = $dados['quantidade'] * $dados['valor'];
        $dados['action'] = 'carregar';
        return $dados;
    }

    public function visualizarCota($get = false) {

        $cotaDao = new CotaDao();
        $dados = $cotaDao->cotaParticipante($get['id']);
        $dados['total'] = $dados['quantidade'] * $dados['valor'];
        return $dados;
    }

    public function editarCota($dados) {
        $id = $dados['id_pessoa'];
        $cotaDao = new CotaDao();
        $cotaDao->editar($dados);
        $cota = $cotaDao->cotaParticipante($id);
        $cota['total'] = $cota['quantidade'] * $cota['valor'];
        $cota['action'] = 'visualizar';
        return $cota;
    }

    public function excluirCota($dados) {
        $id = $dados['id_cota'];
        $cotaDao = new CotaDao();
        $cotaDao->delete($id);
        $dados['sucesso'] = 'Cota excluida com sucesso!';
        $dados['action'] = 'listar';
        return $dados;
    }

    public function pagamentoCota($dados) {
        $cotaDao = new CotaDao();
        $cotaDao->pagamentoCota($dados);
    }

}
