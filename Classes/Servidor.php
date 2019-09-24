<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servidor
 *
 * @author janio
 */
class Servidor
{

    public function migrarServidor($dados)
    {
        try {
            $sd = new ServidorDao();
            $pessoaDao = new PessoaDao();

            $servidor = $sd->getServidorRh($dados);

            $pessoaRh = $pessoaDao->getPessoaRh($servidor);

            $pessoaComum = $pessoaDao->getPessoaComum($pessoaRh);
            if (empty($pessoaComum)) {
                throw new Exception("Não existe pessoa no banco sistemas_comum para o CPF:. " . $pessoaRh['cpf_cnpj'] . "\n\n");
            }
            $pessoaSigaa = $pessoaDao->getPessoaSigaa($pessoaRh);
            if (empty($pessoaSigaa)) {
                throw new Exception("Não existe pessoa no banco sigaa para o CPF:. " . $pessoaRh['cpf_cnpj'] . "\n\n");
            }

            if ($servidor['id_pessoa'] != $pessoaSigaa['id_pessoa']) {
                $servidor['id_pessoa'] = $pessoaSigaa['id_pessoa'];
            }

            if ($sd->existeServidorSigaa($servidor)) {
                echo "já existe um servidor no banco sigaa com o siape:. " . $servidor['siape'] . "<br>";
            } else {
                $sd->inserirServidorSigaa($servidor);
            }
            if ($servidor['id_pessoa'] != $pessoaComum['id_pessoa']) {
                $servidor['id_pessoa'] = $pessoaComum['id_pessoa'];
            }
            if ($sd->existeServidorSistemasComum($servidor)) {
                echo "já existe um servidor no banco sistemas_comum com o siape:. " . $servidor['siape'] . "<br>";
            } else {
                $sd->inserirServidorSistemasComum($servidor);
            }
            return "O servidor foi migrado com sucesso para os bancos sigaa e sistemas_comum!";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function servidorAtivo($dados)
    { }
}
