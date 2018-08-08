
<div class="container-fluid">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <a class="btn btn-primary btn-lg" href="./index.php?action=listar&modulo=Pessoa">Listar Pessoas</a>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <form action="./index.php?action=inserir&modulo=Emprestimo" method="post">
                <input type="hidden" name="id_pessoa" value="<?= $_GET['id'] ?>">
                <div class="form-group col-7">
                    <label for="">Nome</label>
                    <input type="text" value="<?= $_GET['nome'] ?>" class="form-control" name="nome" >
                </div>
                <div class="form-group col-3">
                    <label for="">Valor</label>
                    <input type="text" class="form-control" name="valor" id="valor">
                </div>
                <div class="form-group col-3">
                    <label for="">Data de inicio</label>
                    <input type="text" class="form-control" name="data_inicio" id="data_inicio">
                </div>
                      
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
?>
</body>
</html>
