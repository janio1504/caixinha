<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <nav class="navbar navbar-default sidebar-horizontal">
        <div id="titulo-box">
            <h3>Batidas</h3>
        </div>



        <div id="buscar-batidas" style="text-align: left; padding: 20px 10px;">
            <form id="form_batida" method="post">   
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input id="nome" style="width: 360px" type="text" class="form-control" name="nome" placeholder="NOME">
                </div>
                <div class="form-group">
                    <label for="data_inicio">Data Inicio</label>
                    <input id="data_inicio" style="width: 160px" type="date" class="form-control" name="data_inicio" placeholder="Data ex. 2019-01-11">
                </div>
                <div class="form-group">
                    <label for="data_fim">Data Fim</label>
                    <input id="data_fim" style="width: 160px" type="date" class="form-control" name="data_fim" placeholder="Data ex. 2019-01-11">
                </div> 
                <div class="form-group" id="equipamentos">
                    <label for="equipamentos">Equipamentos</label>
                  
                </div>
                <br><button type="submit" class="btn btn-primary mb-4">Buscar</button>

            </form>
        </div>
        <div id="tabela">

        </div>
    </nav>
</div>


