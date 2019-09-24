<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Unidades
 *
 * @author janio
 */
class Unidades {

    public function listaUnidades() {
        $con = ConSig::pegaConexaoSig();

        $sql = "select * from comum.unidade where id_unidade not in (select id_unidade from frequencia.unidade_ponto_eletronico)";
        $st = $con->prepare($sql);
        $st->execute();
        $lista = $st->fetchAll();
        return $lista;
    }

    public function listaUnidadesDePonto() {
        $con = ConSigLocal::pegaConexaoSigLocal();

        $sql = "select * from frequencia.unidade_ponto_eletronico";
        $st = $con->prepare($sql);
        $st->execute();
        $lista = $st->fetchAll();

        return $lista;
    }

    public function inserirUnidadeDePonto($dados) {
        $con = ConSig::pegaConexaoSig();
        try {     

            $con->beginTransaction();
            $sql = "insert into frequencia.unidade_ponto_eletronico "
                    . " (id_unidade_ponto_eletronico, id_unidade, afeta_unidades_subordinadas, id_registro_entrada, data_implantacao)"
                    . " values "
                    . " (NEXTVAL('frequencia.unidade_ponto_eletronico_seq'), :id_unidade, :afeta_unidades_subordinadas, :id_registro_entrada, :data_implantacao)";
            $st = $con->prepare($sql);
            $st->bindValue(":id_unidade", $dados['id_unidade']);
            $st->bindValue(":afeta_unidades_subordinadas", $dados['afeta_unidades_subordinadas']);
            $st->bindValue(":id_registro_entrada", $dados['id_registro_entrada']);
            $st->bindValue(":data_implantacao", $dados['data_implantacao']);
            $st->execute();
            $con->commit();
        } catch (Exception $ex) {
            $con->rollBack();
            echo 'Falha: '. $ex->getMessage()."\n";exit;
        }
    }

}
