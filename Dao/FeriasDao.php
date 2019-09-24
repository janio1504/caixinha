<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeriasDao
 *
 * @author janio
 */
class FeriasDao {

    public function inserirFeriasDivisao($dados) {        
        $sql = " insert into funcional.ferias_divisao_periodo (id_ferias_divisao_periodo, divisao, id_ferias_configuracao, parcelas)"
                . " values (:id_ferias_divisao_periodo, :divisao, 36, 3)";
        $con  = ConSigLocal::pegaConexaoSigLocal();
        $st = $con->prepare($sql);       
        $st->bindValue(":id_ferias_divisao_periodo", $dados["id_ferias_divisao_periodo"]);        
        $st->bindValue(":divisao", $dados["divisao"]);
        $st->execute();
    }

}
