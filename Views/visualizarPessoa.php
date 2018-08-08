     

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
            <a class="btn btn-primary btn-lg" href="./index.php?id=<?= $dados['id_pessoa'] ?>&action=editar&modulo=Pessoa">Editar Pessoa</a>
            <a class="btn btn-primary btn-lg" href="./index.php?action=listar&modulo=Pessoa">Listar Pessoas</a>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">

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
                    <td>RG</td>
                    <td colspan="3"><?= $dados['rg'] ?></td>
                </tr>
                <tr>
                    <td>Endereço</td>
                    <td colspan="3"><?= $dados['endereco'] ?></td>
                </tr>
                <tr>
                    <td>Bairro</td>
                    <td colspan="3"><?= $dados['bairro'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td colspan="3"><?= $dados['email'] ?></td>
                </tr>
                <tr>
                    <td>telefone</td>
                    <td colspan="3"><?= $dados['telefone'] ?></td>
                </tr>
            </table>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php ?>
</body>
</html>
