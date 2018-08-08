
<div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="./index.php?action=editar&modulo=Pessoa" method="post">
                        <div class="form-group col-2">                            
                            <input type="hidden" value="<?php echo $dados['id_pessoa'] ?>" class="form-control" name="id_pessoa">
                        </div>
                        <div class="form-group col-7">
                            <label for="">Nome</label>
                            <input type="text" value="<?php echo $dados['nome'] ?>" class="form-control" name="nome">
                        </div>
                        <div class="form-group col-3">
                            <label for="">CPF</label>
                            <input type="text" value="<?php echo $dados['cpf'] ?>" class="form-control" name="cpf">
                        </div>
                        <div class="form-group col-3">
                            <label for="">RG</label>
                            <input type="text" value="<?php echo $dados['rg'] ?>" class="form-control" name="rg">
                        </div>
                        <div class="form-group col-7">
                            <label for="">Endereço</label>
                            <input type="text" value="<?php echo $dados['endereco'] ?>" class="form-control" name="endereco">
                        </div>
                        <div class="form-group col-5">
                            <label for="">Bairro</label>
                            <input type="text" value="<?php echo $dados['bairro'] ?>" class="form-control" name="bairro">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Telefone</label>
                            <input type="text" value="<?php echo $dados['telefone'] ?>" class="form-control" name="telefone">
                        </div>
                        <div class="form-group col-5">
                            <label for="">Email</label>
                            <input type="text" value="<?php echo $dados['email'] ?>" class="form-control" name="email" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <?php ?>
    </body>
</html>
