<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author janio
 */
class Util {

    public static function moeda($dados) {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $dados);
        return $valor;
    }

    public static function mostrarValor($dados) {
        $valor = number_format($dados, 2, ',', '.');
        return $valor;
    }

    public static function pegaDataAtual() {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y');
        echo $date;
    }
    
    public static function dataBanco($dados){
        return date("Y-m-d", strtotime(str_replace("/", "-", $dados)));
    }

}
