<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServidorDao
 *
 * @author janio
 */
class ServidorDao
{

    public function getServidorRh($dados)
    {
        $conRh = ConSigLocal::pegaConexaoSig();

        $sql = "select * from rh.servidor where siape = :siape";
        $st = $conRh->prepare($sql);
        $st->bindValue(":siape", $dados['siape']);
        $st->execute();
        $rs = $st->fetchAll();
        if (empty($rs)) {
            return null;
        }
        foreach ($rs as $r) {
            return $r;
        }
    }

    public function existeServidorSigaa($dados)
    {
        $conSigaa = ConSigaaLocal::pegaConexaoSigaa();
        $sql = "select count(*) from rh.servidor  where siape = :siape and data_desligamento is null";
        $st = $conSigaa->prepare($sql);
        $st->bindValue(":siape", $dados['siape']);
        $st->execute();
        $rs = $st->fetchAll();
        foreach ($rs as $r) { }
        if ($r['count'] > 0) {
            return true;
        }
        return false;
    }
    public function existeServidorSistemasComum($dados)
    {
        $conSigaa = ConSigComumLocal::pegaConexaoSigComum();
        $sql = "select count(*) from rh.servidor  where siape = :siape and data_desligamento is null";
        $st = $conSigaa->prepare($sql);
        $st->bindValue(":siape", $dados['siape']);
        $st->execute();
        $rs = $st->fetchAll();
        foreach ($rs as $r) { }
        if ($r['count'] > 0) {
            return true;
        }
        return false;
    }

    public function inserirServidorSigaa($dados)
    {
        if (!$dados) {
            throw new Exception("Não há dados para serem inseridos!");
        }
        $conSigaa = ConSigaaLocal::pegaConexaoSigaa();
        //Util::debug($dados);exit;
        $sql = "insert into rh.servidor "
            . "(id_servidor, siape, id_pessoa, digito_siape, id_escolaridade, id_ativo, id_situacao, id_categoria, id_cargo, lotacao, ultima_atualizacao,"
            . " auxilio_transporte, id_unidade, id_formacao, regime_trabalho,  tipo_vinculo, id_classe_funcional, admissao,"
            . " referencia_nivel_padrao, id_unidade_lotacao, id_unidade_pagadora)"
            . " values "
            . "(:id_servidor, :siape, :id_pessoa, :digito_siape, :id_escolaridade, :id_ativo, :id_situacao, :id_categoria, :id_cargo, :lotacao, :ultima_atualizacao,"
            . " :auxilio_transporte, :id_unidade, :id_formacao, :regime_trabalho,  :tipo_vinculo, :id_classe_funcional, :admissao,"
            . " :referencia_nivel_padrao, :id_unidade_lotacao, :id_unidade_pagadora)";
        $st = $conSigaa->prepare($sql);
        $st->bindValue(":id_servidor", $dados['id_servidor']);
        $st->bindValue(":siape", $dados['siape']);
        $st->bindValue(":id_pessoa", $dados['id_pessoa']);
        $st->bindValue(":digito_siape", $dados['digito_siape']);
        $st->bindValue(":id_escolaridade", $dados['id_escolaridade']);
        $st->bindValue(":id_ativo", $dados['id_ativo']);
        $st->bindValue(":id_situacao", $dados['id_situacao']);
        $st->bindValue(":id_categoria", $dados['id_categoria']);
        $st->bindValue(":id_cargo", $dados['id_cargo']);
        $st->bindValue(":lotacao", $dados['lotacao']);
        $st->bindValue(":ultima_atualizacao", $dados['ultima_atualizacao']);
        $st->bindValue(":auxilio_transporte", $dados['auxilio_transporte']);
        $st->bindValue(":id_unidade", $dados['id_unidade']);
        $st->bindValue(":id_formacao", $dados['id_formacao']);
        $st->bindValue(":regime_trabalho", $dados['regime_trabalho']);
        $st->bindValue(":tipo_vinculo", $dados['tipo_vinculo']);
        $st->bindValue(":id_classe_funcional", $dados['id_classe_funcional']);
        $st->bindValue(":admissao", $dados['admissao']);
        $st->bindValue(":referencia_nivel_padrao", $dados['referencia_nivel_padrao']);
        $st->bindValue(":id_unidade_lotacao", $dados['id_unidade_lotacao']);
        $st->bindValue(":id_unidade_pagadora", $dados['id_unidade_pagadora']);
        $st->execute();
    }

    public function inserirServidorSistemasComum($dados)
    {
        if (!$dados) {
            throw new Exception("Não há dados para serem inseridos!");
        }
        $conSigaa = ConSigComumLocal::pegaConexaoSigComum();

        $sql = "insert into rh.servidor "
            . "(id_servidor, siape, id_pessoa, digito_siape, id_escolaridade, id_ativo, id_situacao, id_categoria, id_cargo, lotacao, ultima_atualizacao,"
            . " auxilio_transporte, id_unidade, id_formacao, regime_trabalho, tipo_vinculo, id_classe_funcional, admissao,"
            . " referencia_nivel_padrao, id_unidade_lotacao, id_unidade_pagadora)"
            . " values "
            . "(:id_servidor, :siape, :id_pessoa, :digito_siape, :id_escolaridade, :id_ativo, :id_situacao, :id_categoria, :id_cargo, :lotacao, :ultima_atualizacao,"
            . " :auxilio_transporte, :id_unidade, :id_formacao, :regime_trabalho, :tipo_vinculo, :id_classe_funcional, :admissao,"
            . " :referencia_nivel_padrao, :id_unidade_lotacao, :id_unidade_pagadora)";
        $st = $conSigaa->prepare($sql);
        $st->bindValue(":id_servidor", $dados['id_servidor']);
        $st->bindValue(":siape", $dados['siape']);
        $st->bindValue(":id_pessoa", $dados['id_pessoa']);
        $st->bindValue(":digito_siape", $dados['digito_siape']);
        $st->bindValue(":id_escolaridade", $dados['id_escolaridade']);
        $st->bindValue(":id_ativo", $dados['id_ativo']);
        $st->bindValue(":id_situacao", $dados['id_situacao']);
        $st->bindValue(":id_categoria", $dados['id_categoria']);
        $st->bindValue(":id_cargo", $dados['id_cargo']);
        $st->bindValue(":lotacao", $dados['lotacao']);
        $st->bindValue(":ultima_atualizacao", $dados['ultima_atualizacao']);
        $st->bindValue(":auxilio_transporte", $dados['auxilio_transporte']);
        $st->bindValue(":id_unidade", $dados['id_unidade']);
        $st->bindValue(":id_formacao", $dados['id_formacao']);
        $st->bindValue(":regime_trabalho", $dados['regime_trabalho']);
        $st->bindValue(":tipo_vinculo", $dados['tipo_vinculo']);
        $st->bindValue(":id_classe_funcional", $dados['id_classe_funcional']);
        $st->bindValue(":admissao", $dados['admissao']);
        $st->bindValue(":referencia_nivel_padrao", $dados['referencia_nivel_padrao']);
        $st->bindValue(":id_unidade_lotacao", $dados['id_unidade_lotacao']);
        $st->bindValue(":id_unidade_pagadora", $dados['id_unidade_pagadora']);
        $st->execute();
    }

    public function servidorAtivo($dados)
    {
        $conSigaa = ConSigaaLocal::pegaConexaoSigaa();
        $sql = "select count(*) from comum.pessoa  where nome ilike :nome";
        $st = $conSigaa->prepare($sql);
        $st->bindValue(":nome", $dados['nome'] . "%");

        $rs = $st->execute();
        var_dump($rs);
        exit;
        return $rs;
    }
}
