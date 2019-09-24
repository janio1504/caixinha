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

    public static function dataBanco($dados) {
        return date("Y-m-d", strtotime(str_replace("/", "-", $dados)));
    }

    public static function mostraData($dados) {

        return date("d/m/Y", strtotime(str_replace("/", "-", $dados)));
    }

    public static function validaCpf($cpf) {
        $cpf = str_replace(['.', '-','""'], "", $cpf);        
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        if (strlen($cpf) != 11) {
            return false;
        }

        if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {

            return false;
        }

        return $cpf;
    }
    
    
    public static function transacao(){
        
    }
    
    public static function debug($servidor){
        echo '<prev>' . print_r($servidor) .'</pre>';
    }

}
