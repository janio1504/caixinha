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
class Conexao {

    public static function pegaConexao() {
        
        try {
            $conexao = new PDO('mysql:host=localhost;dbname=caixinhaDB', 'root', 'ju');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {            

            echo "Erro ao conectar ". $ex->getMessage(); 
            exit;
        }
        
        return $conexao;
    }
    
    

    //put your code here
}
