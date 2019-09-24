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
class ConSigComumLocal
{

    public static function pegaConexaoSigComum()
    {

        try {
            $conexao = new PDO('pgsql:host=localhost;dbname=sistemas_comum', 'postgres', 'postgres');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {

            echo "Erro ao conectar ao banco sig " . $ex->getMessage();
            exit;
        }

        return $conexao;
    }



    //put your code here
}
