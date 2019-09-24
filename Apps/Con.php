<?php

require './config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author janio
 */
class Con {

    public static function pegaConexao() {
        
        try {
            $conexao = new PDO('pgsql:host=200.139.21.59;dbname=vwponto', 'postgres', '3l3tr0n1c0');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {            

            echo "Erro ao conectar ". $ex->getMessage(); 
            exit;
        }
        
        return $conexao;
    }
    
    

    //put your code here
}
