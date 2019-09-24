<?php

class UsuarioDao
{
    public function getUsuario($dados)
    {
        $conRh = ConSig::pegaConexaoSig();

        $sql = "select * from comum.usuario where id_servidor = :id_servidor";
        $st = $conRh->prepare($sql);
        $st->bindValue(":id_servidor", $dados['id_servidor']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return false;
        }
        foreach ($rs as $r) {
            return $r;
        }
    }

    public function existeUsuarioSistemasComum($dados)
    {
        $con = ConSigComum::pegaConexaoSigComum();
        $sql = "select * from comum.usuario where id_servidor = :id_servidor";
        $st = $con->prepare($sql);
        $st->bindValue(':id_servidor', $$dados['id_servidor']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return null;
        }
        return $rs;
    }

    public function existeUsuarioSistemasSigaa($dados)
    {
        $con = ConSigComum::pegaConexaoSigComum();
        $sql = "select * from comum.usuario where id_servidor = :id_servidor";
        $st = $con->prepare($sql);
        $st->bindValue(':id_servidor', $$dados['id_servidor']);
        $st->execute();
        $rs = $st->fetchAll();
        if ($rs == null) {
            return null;
        }
        return $rs;
    }

    public function inserirUsuarioSigaa($dados)
    {
        $con = ConSigaa::pegaConexaoSigaa();
        $sql = " insert into comum.usuario "
            . " (id_usuario, login, id_unidade, id_cargo, funcionario, email,"
            . " inativo, id_pessoa, id_servidor, autorizado, data_cadastro, "
            . " senha, fonte_cadastro) "
            . " values "
            . " (nextval('usuario_seq'), :login, :id_unidade, :id_cargo, :funcionario, :email,"
            . " :inativo, :id_pessoa, :id_servidor, :autorizado, :data_cadastro, "
            . " :senha, :fonte_cadastro)";
        $st = $con->prepare($sql);
        $st->bindValue(":login", $dados['']);
        $st->bindValue(":id_unidade", $dados['']);
        $st->bindValue(":id_cargo", $dados['']);
        $st->bindValue(":funcionario", $dados['']);
        $st->bindValue(":email", $dados['email']);
        $st->bindValue(":inativo", $dados['inativo']);
        $st->bindValue(":id_pessoa", $dados['id_servidor']);
        $st->bindValue(":autorizado", $dados['autorizado']);
        $st->bindValue(":data_cadastro", $dados['data_cadastro']);
        $st->bindValue(":senha", $dados['senha']);
        $st->bindValue(":fonte_cadastro", $dados['fonte_cadastro']);
        $st->execute();
    }
}
