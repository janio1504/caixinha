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
class ConSigComum {

    public static function pegaConexaoSigComum() {
        
        try {
            $conexao = new PDO('pgsql:host=200.139.21.56;dbname=sistemas_comum', 'unifap_ro', 'b4nc0f4pGAA');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {            

            echo "Erro ao conectar ao banco sig ". $ex->getMessage(); 
            exit;
        }
        
        return $conexao;
    }
    
    

    //put your code here
}
