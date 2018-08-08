<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <nav class="navbar navbar-default sidebar-horizontal">
        <div id="titulo-box">
            <h3>Emprestimos</h3>
        </div>

        <div id="botoes-default">
            <a class="btn btn-primary btn-lg" href="./index.php?view=pessoa">Listar Pessoas</a>
        </div>
        
        <div id="tabela"></div>
        <div id="formulario">
            <form id="form-pessoa" method="post">                
                <div class="form-group col-7">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da pessoa">
                </div>
                <div class="form-group col-3">
                    <label for="">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                </div>
                <div class="form-group col-3">
                    <label for="">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="RG">
                </div>
                <div class="form-group col-7">
                    <label for="">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                </div>
                <div class="form-group col-5">
                    <label for="">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                </div>
                <div class="form-group col-3">
                    <label for="">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                </div>
                <div class="form-group col-5">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </nav>
</div>
