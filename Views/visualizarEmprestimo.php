     

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            try {
                if (isset($dados['alert'])) {
                    Alerta::alert($dados['alert']);
                    unset($dados['alert']);
                }
                if (isset($dados['sucesso'])) {
                    Sucesso::sucess($dados['sucesso']);
                }
            } catch (Erro $ex) {
                $ex->trataErro($e);
                exit;
            }
            ?> 
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <a class="btn btn-primary btn-lg" href="./index.php?id=<?= $dados['id_pessoa'] ?>&action=carregar&modulo=Emprestimo">Editar Emprestimo</a>
            <a class="btn btn-primary btn-lg" href="./index.php?action=listar&modulo=Emprestimo">Listar Emprestimos</a>
            <a class="btn btn-primary btn-lg" href="./index.php?id=<?= $dados['id_pessoa'] ?>&action=carregar&modulo=Emprestimo">Pagar</a>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form class="form-inline" action="./index.php?action=visualizar&modulo=Emprestimo" method="post">
                <div class="form-group col-sm-4 mb-4">
                    <input style="width: 400px" type="text" class="form-control" name="nome" placeholder="Buscar Pessoa">
                </div>
                <button type="submit" class="btn btn-primary mb-4">Buscar</button>
            </form>
        </div> 
        <div class="col-md-2"></div>
    </div>
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php if (isset($dados['nome'])) { ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Nome</td>
                        <td colspan="3"><?= $dados['nome'] ?></td>
                    </tr>
                    <tr>
                        <td>CPF</td>
                        <td colspan="3"><?= $dados['cpf'] ?></td>
                    </tr>
                    <tr>
                        <td>Emprestimo</td>

                        <td>Valor: <?= $dados['valor'] ?></td>
                        <td>Status: <?= $dados['status'] ?></td>
                    </tr>
                </table>
            <?php } ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php if (isset($dados['pagamentos'])) { ?>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <td>Valor pago</td>
                            <td>Juros</td>
                            <td>Data do pagamento</td>
                        </tr>
                    </thead>

                    <?php foreach ($dados['pagamentos'] as $pagamentos) {
                        ?>
                        <tr>                         
                            <td><?= $pagamentos['valor'] ?></td>
                            <td><?= $pagamentos['juros'] ?></td>
                            <td><?= $pagamentos['data'] ?></td>
                        </tr>
                         <?php } ?>
                    </table>
                <?php  } ?>
        </div> 
        <div class="col-md-2"></div>
    </div>
</div>
<?php ?>
</body>
</html>
