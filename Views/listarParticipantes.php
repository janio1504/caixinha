
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            
            try {
                foreach ($dados as $dado){
                if (isset($dado['alert'])) {
                    Alerta::alert($dado['alert']);
                    unset($dados['alert']);
                }
                if (isset($dado['sucesso'])) {
                    Sucesso::sucess($dados['sucesso']);
                }
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
            <a class="btn btn-primary btn-lg" href="./index.php?action=listar&modulo=Pessoa&metodo=Participantes">Listar Pessoas</a>
        </div> 
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form class="form-inline" action="./index.php?action=buscar&modulo=Pessoa" method="post">
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
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>                        
                        <th>Id</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Ações</th>                    
                    </tr>
                </thead>

                <?php foreach ($dados as $pessoa) {;?>
                    <tbody>
                        <tr>
                            <td><?php echo $pessoa['id_pessoa']; ?></td>
                            <td><?php echo $pessoa['nome']; ?></td>
                            <td><?php echo $pessoa['cpf']; ?></td>
                            <td >
                                <a class="btn btn-info" href="index.php?id=<?= $pessoa['id_pessoa']; ?>&action=carregar&modulo=Pessoa">Editar</a>
                                <a class="btn btn-info" href="./index.php?id=<?= $pessoa['id_pessoa']; ?>&nome=<?= $pessoa['nome'] ?>&action=cad-cota">Incluir Cota</a>
                                <a class="btn btn-info" href="./index.php?id=<?= $pessoa['id_pessoa']; ?>&action=excluir&modulo=Pessoa">Excluir</a>
                            </td> 
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php ?>
</body>
</html>
