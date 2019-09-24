<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Biblioteca
 *
 * @author janio
 */
class Biblioteca {

    public function getPessoaBiblioteca($dados) {

        try {
            if (empty($dados['cpf'])) {
                throw new Exception('Nenhum CPF informado!');
            }
            if (empty(Util::validaCpf($dados['cpf']))) {
                throw new Exception("CPF inválido!");
            }
            $dados['cpf'] = Util::validaCpf($dados['cpf']);
            $bibliotecaDao = new BibliotecaDao();
            $pessoa = $bibliotecaDao->getPessoaAcademico($dados);
            if (empty($pessoa)) {
                throw new Exception("Nenhuma pessoa encontrada ou o cpf esta incorreto!");
            }
            $valido_comum = $bibliotecaDao->getPessoaComum($dados);
            foreach ($valido_comum as $vc) {
                $pessoa['valido_comum'] = $vc;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }
        return $pessoa;
    }

    public function discenteValidoBiblioteca($dados) {

        try {
            $bibliotecaDao = new BibliotecaDao($dados);
            $bibliotecaDao->discenteValidoSigaa($dados);
            $bibliotecaDao->discenteValidoComum($dados);
            return "Atualização realizada com sucesso!";
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }
    }

}
