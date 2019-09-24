

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TerminalController
 *
 * @author janioe
 */
class TerminalController
{

    public function __construct()
    {

        $con = ConSigaa::pegaConexaoSigaa();
        $sql = " select nextval('usuario_seq')";
        $st = $con->prepare($sql);
        $st->execute();
        var_dump($st->fetchAll());

        //        echo 'Nome.:';
        //        $dados['nome'] = trim(fgets(STDIN));
        //
        /*        echo 'Siape.: ';
        $dados['siape'] = trim(fgets(STDIN));


        $s = new Servidor();
        $s->migrarServidor($dados);*/

        //
        //
        //        //Util::debug($servidor);




        //        $fd = new Ferias();
        //        $divisoes = array();        
        //        $arquivo = fopen("divisao_ferias_3.csv", "r+");
        //        $id_fdp = 36189;
        //        $n = 1;
        //        while ($linha = fgetcsv($arquivo, 1000, ";")) {            
        //            $divisoes['divisao'] = $linha[0];
        //            $divisoes['id_ferias_divisao_periodo'] = $id_fdp;
        //            $ifdp = $fd->inserirDivisaoFerias($divisoes);
        //            echo $n." - ".$ifdp." - ".$divisoes["divisao"]." - ".$id_fdp."\n";
        //            $id_fdp++;
        //            $n++;
        //        }
        //        fclose($arquivo);
    }
}
