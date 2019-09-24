<?php

class JsonController {

    public function __construct() {
        //var_dump($_POST);die();
        
        if (isset($_GET['modulo']) && isset($_GET['action'])) {
            $modulo = $_GET['modulo'];
            $action = $_GET['action'];

            $metodo = $action . $modulo;

            $this->classe = new $modulo();

            if (isset($_GET['id'])) {
                $get['id'] = $_GET['id'];
                $dados = json_encode($this->classe->$metodo($get));
                echo json_encode($dados);
                exit;
            } elseif(!$_GET) {
                $dados = json_encode($this->classe->$metodo());
                echo json_encode($dados);
                exit;
            }
            
            if (!isset($_POST)) {
                $dados = json_encode($this->classe->$metodo());
                echo json_encode($dados);
                exit;
            } elseif (isset($_POST)) {
                $dados = json_encode($this->classe->$metodo($_POST));                
                echo json_encode($dados);
                exit;
            }
        }
    }

}
