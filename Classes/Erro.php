<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Erro
 *
 * @author janio
 */
class Erro extends Exception {

    public static function trataErro(Exception $e) {       
      
        
        ?>
        <div class="alert alert-danger" id="div-erro">            
            <?php echo 'ERRO '. $e->getMessage(); exit; ?>
        </div>
        <?php
    }
    
    public static function mostraErro($dados){
        echo '<pre>';
        print_r($dados);
        echo '</pre>';
        exit;
    }
    
    public static function getErro (Exception $e){
      return $erro['errors'] = Erro::trataErro($e); 
    }
    

}
