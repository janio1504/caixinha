
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <nav class="navbar navbar-default sidebar-horizontal">
        <div id="titulo-box">
            <h3>Emprestimos</h3>
        </div>

        <div id="botoes-default">
            <a class="btn btn-primary btn-lg" href="./index.php?action=listar&modulo=Pessoa">Listar Pessoas</a>
        </div>
        <div id="buscar-pessoa">
            <form class="form-inline" id="form-busca" method="post">
                <input style="width: 400px" type="text" id="nome" class="form-control" name="nome" placeholder="Buscar Pessoa">

                <button type="submit" id="busca-pessoa" class="btn btn-primary mb-4">Buscar</button>

            </form>
        </div>
        <div id="tabela"></div>
        <div id="formulario">
            <form id="form-cota" method="post">
                <input type="hidden" name="id_pessoa" id="id_pessoa">
                <div class="form-group col-7">
                    <label for="">Nome</label>
                    <input type="text" id="nome" class="form-control" name="nome" >
                </div>
                <div class="form-group col-3">
                    <label for="">Valor</label>
                    <input type="text" id="valor" value="50"class="form-control" name="valor">
                </div>
                <div class="form-group col-3">
                    <label for="">Quantidade</label>
                    <select type="" class="form-control" id="quantidade" name="quantidade">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>                     
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
        </nav>
</div>