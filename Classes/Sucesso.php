<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sucesso
 *
 * @author janio
 */
class Sucesso {

    public static function sucess($dados) {
        ?>
        <div class="alert alert-success">
            <?php echo $dados; ?>
        </div>

        <?php
    }
} 