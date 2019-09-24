<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ferias
 *
 * @author janio
 */
class Ferias {
   public function inserirDivisaoFerias($dados){       
       try {
//           $fdDao = new FeriasDao();
//           $fdDao->inserirFeriasDivisao($dados);
           return "Cadastro realizado com sucesso!";
       } catch (Exception $ex) {
           echo $ex->getMessage();exit; 
       }
       
    
   }
}
