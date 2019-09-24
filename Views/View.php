<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author janio
 */
class View {
    public function __construct($action, $dados = false) {
        require './Views/head.php';
        require './Views/'.$action.'.php';
        require './Views/footer.php';
    }
}
