<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <nav class="navbar navbar-default sidebar-horizontal">
        <div id="titulo-box">
            <h3>Pessoas</h3>
        </div>

        <div id="botoes-default">
            
            <a class="btn btn-primary btn-lg" href="./index.php?view=cad-pessoa">Cadastrar Pessoa</a>
            <a class="btn btn-primary btn-lg" id="listar-pessoas">Listar Pessoas</a>
        </div>

        <div id="buscar-pessoa">
            <form class="form-inline" id="form-busca" method="post">        
                <input style="width: 400px" type="text" class="form-control" name="nome" placeholder="Buscar Pessoa">

                <button type="submit" class="btn btn-primary mb-4">Buscar</button>

            </form>
        </div>
        <div id="tabela"></div>
    </nav>
</div>


