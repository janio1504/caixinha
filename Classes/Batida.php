<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Batida
 *
 * @author janio
 */
class Batida {

    public function listarBatida($dados) {
        try {
            $BatidaDao = new BatidaDao();
            if ($dados['nome']) {
                $servidor = $BatidaDao->getServidor($dados);
                $dados['nitpis'] = $servidor[0]['nitpis'];
            }else{
                $dados['nitpis'] = '';
            }
            //var_dump($dados);die();
            $batidas = $BatidaDao->listarBatidas($dados);
            //var_dump($batidas);die();
            if (empty($batidas)) {
                throw new Exception("Nenhuma batida encontrada!");
            }
            return $batidas;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

    public function listaSigBatida($dados) {
        try {
            $BatidaDao = new BatidaDao();
            $servidor = $BatidaDao->getServidor($dados);
            //var_dump($servidor);die();
            $dados['siape'] = $servidor[0]['siape'];
            //var_dump($dados);die();
            $batidas = $BatidaDao->listaBatidaSig($dados);
            //var_dump($batidas);die();
            if (empty($batidas)) {
                throw new Exception("Nenhuma batida encontrada!");
            }
            return $batidas;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

    public function updateBatida($dados) {

        $batida = explode(" ", $dados['batida']);
        $dados['data'] = $batida[0];

        try {
            $BatidaDao = new BatidaDao();
            $BatidaDao->atualizarBatida($dados);
            $batidas = $BatidaDao->listarBatidas($dados);

            return $batidas;
        } catch (Exception $ex) {
            
        }
    }

}
