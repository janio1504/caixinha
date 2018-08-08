     

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
            <a class="btn btn-primary btn-lg" href="./index.php?action=listar&modulo=Emprestimo">Listar Emprestimos</a>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="./index.php?action=pagar&modulo=Emprestimo" method="POST">
                <table class="table table-bordered">
                    <input type="hidden" name="id_emprestimo" value="<?=  $dados['id_emprestimo']?>">
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
                        <td>Emprestimo</td>

                        <td class="form-group"><?= Util::mostrarValor($dados['valor']); ?></td>
                        
                    </tr>
                    <tr>
                        <td>Pagamento</td>
                        <td class="form-group"><input style="width: 110px;" value="0,00" type="text" id="valor" name="valor" class="form-control" ></td>
                    </tr>
                    <tr>
                        <td>Juros</td>
                        <td class="form-group"><input style="width: 110px;" value="0,00" type="text" id="valor" name="juros" class="form-control" ></td>
                    </tr>
                    <tr>
                        <td>Data</td>
                        <td class="form-group"><input style="width: 110px;" type="text" id="data" name="data" class="form-control" value="<?= Util::pegaDataAtual(); ?>"></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" class="form-group"><button type="submit" class="btn btn-primary" >Pagar</button></td>
                    </tr>

                </table>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php ?>
</body>
</html>
