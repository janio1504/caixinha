<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnidadesPonto
 *
 * @author janio
 */
class UnidadesPonto {

    public function inserirUnidadesDePonto() {
        $unidades = new Unidades();
        $dados = array();
        $listaUnidades = $unidades->listaUnidades();

        $n = 1;
        foreach ($listaUnidades as $unidade) {

            $dados['id_unidade'] = $unidade['id_unidade'];
            $dados['afeta_unidades_subordinadas'] = true;
            $dados['id_registro_entrada'] = 6144349;
            $dados['data_implantacao'] = '2019-09-03';
            $unidades->inserirUnidadeDePonto($dados);

            echo $n++ . " ID UNIDADE: " . $dados['id_unidade'] . " AFETA UNID. SUBORD.: " . $dados['afeta_unidades_subordinadas']
            . " ID REG. DE ENTRADA: " . $dados['id_registro_entrada'] . " DATA DE IMPLANTAÇÃO: " . $dados['data_implantacao'] . "\n";
            continue;
        }
        echo "\n";
        echo "----------------------------------------------------------------------------";
        echo "\n";
        echo 'As unidades de ponto foram inseridas com sucesso!'."\n";
    }

}
