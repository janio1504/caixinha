     

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
            <a class="btn btn-primary btn-lg" href="./index.php?id=<?= $dados['id_pessoa'] ?>&action=carregar&modulo=Cota">Editar cota</a>
            <a class="btn btn-primary btn-lg" href="./index.php?action=listar&modulo=Pessoa">Listar Pessoas</a>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="./index.php?action=editar&modulo=Cota" method="POST">
                <table class="table table-bordered">
                    <input type="hidden" name="id_cota" value="<?=  $dados['id_cota']?>">
                    <input type="hidden" name="id_pessoa" value="<?=  $dados['id_pessoa']?>">
                    <tr>
                        <td>Nome</td>
                        <td colspan="4"><?= $dados['nome'] ?></td>
                    </tr>
                    <tr>
                        <td>CPF</td>
                        <td colspan="4"><?= $dados['cpf'] ?></td>
                    </tr>
                    <tr>
                        <td>Cotas</td>

                        <td class="form-group"><input type="text" name="quantidade" class="form-control" value="<?= $dados['quantidade'] ?>"></td>
                        <td class="form-group"><input type="text" name="valor" class="form-control" value="<?= $dados['valor'] ?>"></td>
                        <td class="form-group"><input type="text" name="total" class="form-control" value="<?= $dados['total'] ?>"></td>
                        <td class="form-group"><button type="submit" class="btn btn-primary" >Salvar</button></td>
                    </tr>

                </table>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php ?>
</body>
</html>
