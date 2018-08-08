
$(document).ready(function () {


});

$("#listar-emprestimo").click(function (e) {

    e.preventDefault();
    //$("#tabela").html("");
    $.ajax({
        url: "./index.php?action=listar&modulo=Emprestimo&control=Json",
        type: "GET",
        dataType: "json",
        beforeSend: function () {
            $("tabela").html("<span>Carregando...</span>");
        },
        success: function (data) {
            $("#tabela").html("");
            let emprestimos = JSON.parse(data);
            $("#tabela").append("<table class='table table-striped table-bordered' id='tabela-emprestimo'>");
            $("#tabela-emprestimo").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>CPF</th><th>Emprestimo</th><th>Ações</th></tr></thead>");
            console.log(emprestimos);

            for (e in emprestimos) {
                let emprestimo = emprestimos[e];
                $("#tabela-emprestimo").append("<tbody><tr>" + "<td>" + emprestimo.id_pessoa + "</td>"
                        + " <td>" + emprestimo.nome + "</td>" + "<td>" + emprestimo.cpf + "</td>" + "<td>" + emprestimo.valor + "</td>"
                        + " </td><td><button class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></button>"
                        + " <button class='btn btn-info'><span class='glyphicon glyphicon-search'></span></button></td></tr></tbody>");

            }

            $("#tabela").append("</table>");
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
            setTimeout(function () {
                $("#tabela").html('');
            }, 5000);


        }

    });

    $("#listar-emprestimo").prop("disabled", true);
});



$("#listar-cotas").click(function (e) {

    e.preventDefault();
    //$("#tabela").html("");
    $.ajax({
        url: "./index.php?action=listar&modulo=Cota&control=Json",
        type: "GET",
        dataType: "json",
        beforeSend: function () {
            $("tabela").html("<span>Carregando...</span>")
        },
        success: function (data) {
            $("#tabela").html("");
            let cotas = JSON.parse(data);
            $("#tabela").append("<table class='table table-striped table-bordered' id='tabela-cota'>");
            $("#tabela-cota").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>Quantidade</th><th>Valor total</th><th>Ações</th></tr></thead>");
            console.log(cotas);

            for (c in cotas) {
                let cota = cotas[c];
                $("#tabela-cota").append("<tbody><tr>" + "<td>" + cota.id_pessoa + "</td>"
                        + " <td>" + cota.nome + "</td>" + "<td>" + cota.quantidade + "</td>" + "<td>" + cota.quantidade * cota.valor + "</td>"
                        + " </td><td><button class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></button>"
                        + " <button class='btn btn-info'><span class='glyphicon glyphicon-search'></span></button></td></tr></tbody>");

            }

            $("#tabela").append("</table>");
        },
        error: function (error) {

            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });


});

$("#listar-pessoas").click(function (e) {
    e.preventDefault();
    listarPessoas();
});


function listarPessoas() {


    $.ajax({
        url: "./index.php?action=listar&modulo=Pessoa&control=Json",
        type: "GET",
        dataType: "json",
        beforeSend: function () {
            $("tabela").html("<span id'span-carregando'>Carregando...</span>");

        },
        success: function (data) {
            $("#tabela").html("");
            let pessoas = JSON.parse(data);
            $("#tabela").append("<table class='table table-striped table-bordered' id='tabela-pessoa'>");
            $("#tabela-pessoa").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>Quantidade</th><th>Valor total</th><th>Ações</th></tr></thead>");

            for (p in pessoas) {
                let pessoa = pessoas[p];
                $("#tabela-pessoa").append("<tbody><tr class='linha-" + pessoa.id_pessoa + "'>" + "<td>" + pessoa.id_pessoa + "</td>"
                        + " <td>" + pessoa.nome + "</td>" + "<td>" + pessoa.cpf + "</td>" + "<td>" + pessoa.telefone + "</td>"
                        + " </td><td><button class='btn btn-info' id='botao-editar' value='" + pessoa.id_pessoa + "'><span class='glyphicon glyphicon-pencil'></span></button>"
                        + " <button class='btn btn-info' id='botao-visualizar'><span class='glyphicon glyphicon-search'></span></button>"
                        + " <a class='btn btn-danger modalExcluir' id='" + pessoa.id_pessoa + "' data-toggle='modal' data-target='#modalExcluir'><span class='glyphicon glyphicon-remove'></span></a></td></tr></tbody>");

            }

            $("#tabela").append("</table>");



        },
        error: function (error) {

            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });
}
;

$("#tabela").on("click", ".modalExcluir", function () {

    $("#tabela").append("<div class='modal' id='modalExcluir' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"
            + " <div class='modal-dialog' role='document'>"
            + " <div class='modal-content'>"
            + " <div class='modal-header'><button type='button' class='close' data-dismiss='modal'>X</button></div>"
            + " <div class='modal-body'>O registro " + this.id + " sera excluido!</div>"
            + " <div class='modal-footer'>"
            + " <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>"
            + " <button type='button' class='btn btn-danger botao-excluir modalAlert' data-dismiss='modal' id='" + this.id + "' ><span class='glyphicon glyphicon-remove'></span> Excluir</button>"
            + " </div>"
            + " </div>"
            + " </div>"
            + " </div>"

            );
    $("#tabela").append("</div>");

});

$(".modalAlert").click(function modalAlert() {

    $("#tabela").append("<div class='modal' id='modalAlert' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"
            + " <div class='modal-dialog' role='document'>"
            + " <div class='modal-content'>"
            + " <div class='modal-header'><button type='button' class='close' data-dismiss='modal'>X</button></div>"
            + " <div class='modal-body'><span id='mensagem'>Ação execultada com sucesso!</span></div>"
            + " <div class='modal-footer'>"
            + " <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>"
            + " </div>"
            + " </div>"
            + " </div>"
            + " </div>"

            );
    $("#tabela").append("</div>");

});




$("#tabela").on("click", ".botao-excluir", function (e) {
    e.preventDefault();
    let id = this.id;
    let dados = {'id': id};
    $.ajax({
        url: "index.php?action=excluir&modulo=Pessoa&control=Json",
        type: "post",
        data: dados,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $(".linha-" + id).remove();
            listarPessoas();

        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });
});


$("#form-busca").on("submit", function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
        url: "index.php?action=buscar&modulo=Pessoa&control=Json",
        type: "post",
        data: data,
        dataType: "json",
        beforeSend: function () {
            $("tabela").html("<span>Carregando...</span>")
        },
        success: function (dados) {

            let pessoa = JSON.parse(dados);
            $("#id_pessoa").val(pessoa.id_pessoa);
            $("#nome-pessoa").val(pessoa.nome);

        },
        error: function (error) {

            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });

    //$("#listar-emprestimo").prop("disabled", true);
});

$("#form-cota").on("submit", function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
        url: "./index.php?action=inserir&modulo=Cota",
        type: "post",
        data: data,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Salvando...</span>")
        },
        sucesse: function (dados) {
            $("#tabela").html("<div class='alert alert-sucess'>" + dados.responseText + "</div>");
            $("#id_pessoa").val("");
            $("#nome").val("");
            $("#valor").val("");
            $("#quantidade").val("");
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }
    });
});

$("#form-pessoa").on("submit", function (e) {
    e.preventDefault();
    let formDados = $(this).serialize();
    $.ajax({
        url: "./index.php?action=inserir&modulo=Pessoa&control=Json",
        type: "post",
        data: formDados,
        dataType: "json",
        sucesse: function (data) {

            if (data === 1) {
                location.reload();
                $("#tabela").html("<div class='alert alert-sucess'>Cadastro realizado com sucesso</div>");

                $("#nome").val("");
                $("#cpf").val("");
                $("#endereco").val("");
            } else {
                $("#tabela").html("<div class='alert alert-sucess'>deu merda</div>");
            }
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }
    });
});




