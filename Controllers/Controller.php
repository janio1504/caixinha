<?php

class Controller {

    public $classe;
    public $view;

    public function __construct() {
        $dados = array();
        $view = null;
        if(isset($_GET['view'])){
            $view = $_GET['view'];
        }

        if (isset($_GET['modulo']) && isset($_GET['action'])) {
            $modulo = $_GET['modulo'];
            $action = $_GET['action'];

            $metodo = $action . $modulo;

            $this->classe = new $modulo();

            if (isset($_GET['id'])) {
                $get['id'] = $_GET['id'];
                $dados = $this->classe->$metodo($get);
            } else {                
                $dados = $this->classe->$metodo();
            }
            
            if (!isset($_POST)) {
                $dados = $this->classe->$metodo();
            } elseif (isset($_POST)) {
                $dados = $this->classe->$metodo($_POST);            
            }
            
        }
        
        $this->view($view, $dados);

    }

    public function view($view, $dados = null) {
        //Erro::mostraErro($dados);
        if (isset($view)) {
            $this->view = new View($view, $dados);
        } else {
            $view = 'home';
            $this->view = new View($view);
        }
    }

}
