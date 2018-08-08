<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de controle de cotas e emprestimos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">

    </head>
    <body>

        <div class="container-fluid">
            
            <!--  ------------------------------------------------------------ 
                            Menu vertical do sistema
             ------------------------------------------------------------  -->
            <div class="col-sm-3 col-md-2" id="sidebar">
                <div id="sidebar-header">
                    <h3>CAIXINHA</h3>

                </div>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="./index.php" id="index">
                            <i class="glyphicon glyphicon-home"></i>
                            Principal
                        </a>                        
                    </li>
                    <li>
                        <a href="./index.php?view=emprestimo">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Emprestimos
                        </a>
                        <a href="./index.php?view=cota">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Cotas
                        </a>

                    </li>
                    <li>
                        <a href="./index.php?view=pessoa">
                            <i class="glyphicon glyphicon-link"></i>
                            Pessoas
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-send"></i>
                            Contato
                        </a>
                    </li>
                </ul>
            </div>
            <!--  ------------------------------------------------------------ 
                            Titulo do sistema
             ------------------------------------------------------------  -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <nav class="navbar navbar-default sidebar-horizontal">
                    <h3>Sistema de controle de cotas e emprestimos</h3>
                </nav>
            </div>
            
            

