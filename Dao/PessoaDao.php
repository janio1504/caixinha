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
class PessoaDao
{


    public function getPessoaRh($dados)
    {
        $conRh = ConSigLocal::pegaConexaoSig();

        $sql = "select * from comum.pessoa where id_pessoa = :id_pessoa";
        $st = $conRh->prepare($sql);
        $st->bindValue(":id_pessoa", $dados['id_pessoa']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return false;
        }
        foreach ($rs as $r) {
            return $r;
        }
    }

    public function getPessoaComum($dados)
    {
        $conRh = ConSigComumLocal::pegaConexaoSigComum();

        $sql = "select * from comum.pessoa where cpf_cnpj = :cpf_cnpj";
        $st = $conRh->prepare($sql);
        $st->bindValue(":cpf_cnpj", $dados['cpf_cnpj']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return false;
        }
        foreach ($rs as $r) {
            return $r;
        }
    }

    public function getPessoaSigaa($dados)
    {
        $conRh = ConSigaaLocal::pegaConexaoSigaa();

        $sql = "select * from comum.pessoa where cpf_cnpj = :cpf_cnpj";
        $st = $conRh->prepare($sql);
        $st->bindValue(":cpf_cnpj", $dados['cpf_cnpj']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return false;
        }
        foreach ($rs as $r) {
            return $r;
        }
    }

    public function existePessoaSistemasComum($dados)
    {
        $con = ConSigComumLocal::pegaConexaoSigComum();
        $sql = "select id_pessoa from comum.pessoa where cpf_cnpj = :cpf_cnpj";
        $st = $con->prepare($sql);
        $st->bindValue(':cpf_cnpj', $$dados['cpf_cnpj']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return false;
        }
        foreach ($rs as $r) {
            return $r;
        }
    }

    public function existePessoaSigaa($dados)
    {
        $con = ConSigaaLocal::pegaConexaoSigaa();
        $sql = "select id_pessoa from comum.pessoa where cpf_cnpj = :cpf_cnpj";
        $st = $con->prepare($sql);
        $st->bindValue(':cpf_cnpj', $$dados['cpf_cnpj']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return false;
        }
        foreach ($rs as $r) {
            return $r;
        }
    }

    public function inserirPessoaSigaa($dados)
    {
        if (!$dados) {
            throw new Exception("Não há dados para serem inseridos!");
        }
        $conSigaa = ConSigaaLocal::pegaConexaoSigaa();
        $sql = "insert into comum.pessoa (id_pessoa, nome, data_nascimento, sexo, id_raca, id_endereco_recidencial, id_contato, cpf_cnpj, id_ies, id_pais,"
            . " id_pais_nacionalidade, nome_pai, nome_mae, email, id_estado_civil, id_uf_naturalidade, id_municipio_naturalidade, endereco, tipo, valido, "
            . " ultima_atualizacao, funcionario, codmerg, numero_identidade, orgao_expedicao_identidade, telefone_fixo, internacional, nome_ascii,"
            . " pais_nacionalidade, nome_oficial) "
            . " values "
            . " (nextval('pessoa_seq'), :nome, :data_nascimento, :sexo, :id_raca, :id_endereco_recidencial, :id_contato, :cpf_cnpj, :id_ies, :id_pais,"
            . " :id_pais_nacionalidade, :nome_pai, :nome_mae, :email, :id_estado_civil, :id_uf_naturalidade, :id_municipio_naturalidade, :endereco, :tipo, :valido,"
            . " :ultima_atualizacao, :funcionario, :codmerg, :numero_identidade, :orgao_expedicao_identidade, :telefone_fixo, :internacional, :nome_ascii,"
            . " :pais_nacionalidade, :nome_oficial)";
        $st = $conSigaa->prepare($sql);
        //$st->bindValue(":id_pessoa", $dados['id_pessoa']);
        $st->bindValue(":nome", $dados['nome']);
        $st->bindValue(":data_nascimento", $dados['data_nascimento']);
        $st->bindValue(":sexo", $dados['sexo']);
        $st->bindValue(":id_raca", $dados['id_raca']);
        $st->bindValue(":id_endereco_recidencial", $dados['id_endereco_recidencial']);
        $st->bindValue(":id_contato", $dados['id_contato']);
        $st->bindValue(":cpf_cnpj", $dados['cpf_cnpj']);
        $st->bindValue(":id_ies", $dados['id_ies']);
        $st->bindValue(":id_pais", $dados['id_pais']);
        $st->bindValue(":id_pais_nacionalidade", $dados['id_pais_nacionalidade']);
        $st->bindValue(":nome_pai", $dados['nome_pai']);
        $st->bindValue(":nome_mae", $dados['nome_mae']);
        $st->bindValue(":email", $dados['email']);
        $st->bindValue(":id_estado_civil", $dados['id_estado_civil']);
        $st->bindValue(":id_uf_naturalidade", $dados['id_uf_naturalidade']);
        $st->bindValue(":id_municipio_naturalidade", $dados['id_municipio_naturalidade']);
        $st->bindValue(":endereco", $dados['endereco']);
        $st->bindValue(":tipo", $dados['tipo']);
        $st->bindValue(":valido", $dados['valido']);
        $st->bindValue(":ultima_atualizacao", $dados['ultima_atualizacao']);
        $st->bindValue(":funcionario", $dados['funcionario']);
        $st->bindValue(":codmerg", $dados['codmerg']);
        $st->bindValue(":numero_identidade", $dados['numero_identidade']);
        $st->bindValue(":orgao_expedicao_identidade", $dados['orgao_expedicao_identidade']);
        $st->bindValue(":telefone_fixo", $dados['telefone_fixo']);
        $st->bindValue(":internacional", $dados['internacional']);
        $st->bindValue(":nome_ascii", $dados['nome_ascii']);
        $st->bindValue(":pais_nacionalidade", $dados['pais_nacionalidade']);
        $st->bindValue(":nome_oficial", $dados['nome_oficial']);
        $st->execute();
    }

    public function inserirPessoaSistemasComum($dados)
    {
        if (!$dados) {
            throw new Exception("Não há dados para serem inseridos!");
        }
        $conSigaa = ConSigComumLocal::pegaConexaoSigComum();
        $sql = "insert into comum.pessoa (id_pessoa, endereco, telefone, tipo, cpf_cnpj, nome,"
            . " matricula, id_cargo, data_nascimento, sexo, email, funcionario, emiti_fatura, "
            . " internacional, ultima_atualizacao, valido, nome_ascii, origem, nome_mae, "
            . " nome_oficial) "
            . " values "
            . " (nextval('pessoa_seq'), :endereco, :telefone, :tipo, :cpf_cnpj, :nome,"
            . " :matricula, :id_cargo, :data_nascimento, :sexo, :email, :funcionario, :emiti_fatura,"
            . " :internacional, :ultima_atualizacao, :valido, :nome_ascii, :origem, :nome_mae,"
            . " :nome_oficial)";
        $st = $conSigaa->prepare($sql);
        $st->bindValue(":endereco", $dados['endereco']);
        $st->bindValue(":telefone", $dados['telefone']);
        $st->bindValue(":tipo", $dados['tipo']);
        $st->bindValue(":cpf_cnpj", $dados['cpf_cnpj']);
        $st->bindValue(":nome", $dados['nome']);
        $st->bindValue(":matricula", $dados['matricula']);
        $st->bindValue(":id_cargo", $dados['id_cargo']);
        $st->bindValue(":data_nascimento", $dados['data_nascimento']);
        $st->bindValue(":sexo", $dados['sexo']);
        $st->bindValue(":email", $dados['email']);
        $st->bindValue(":funcionario", $dados['funcionario']);
        $st->bindValue(":emite_fatura", $dados['emite_fatura']);
        $st->bindValue(":internacional", $dados['internacional']);
        $st->bindValue(":ultima_atualizacao", $dados['ultima_atualizacao']);
        $st->bindValue(":valido", $dados['valido']);
        $st->bindValue(":nome_ascii", $dados['nome_ascii']);
        $st->bindValue(":origem", $dados['origem']);
        $st->bindValue(":nome_mae", $dados['nome_mae']);
        $st->bindValue(":nome_oficial", $dados['nome_oficial']);
        $st->execute();
    }
}
