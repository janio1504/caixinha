<?php 

class Script{
       
    public function listar(){
        
        $eD = new EmprestimoDao();
        
        return json_encode($eD->listar());
        
    }
    
}

