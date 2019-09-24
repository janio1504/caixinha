
$(document).ready(function () {
    //listaEquipamentos();


});

/* LISTAR EMPRESTIMO */

let dados_batida;

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


/* LISTAR COTAS */

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

/* LISTAR PESSOAS */

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
            $("#tabela").html("<span id'span-carregando'>Carregando...</span>");

        },
        success: function (data) {
            //$("#tabela").html("");
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

/* MODAL EXCLUIR */

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

/* MODAL ALERT */

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


/* EXCLUIR PESSOA */

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

            let resp = JSON.parse(data);
            $("#tabela").html("<span id='alerta'><div class='alert alert-success'>" + resp.sucesso + "</div></span>");
            setTimeout(function () {
                $("#tabela #alerta").html('');
            }, 5000);
            $(".linha-" + id).remove();
            listarPessoas();

        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });
});

/* BUSCAR PESSOA */

$("#form-busca").on("submit", function (e) {

    e.preventDefault();
    let dados = $(this).serialize();
    $.ajax({
        url: "index.php?action=buscar&modulo=Pessoa&control=Json",
        type: "post",
        data: dados,
        dataType: "json",
        beforeSend: function () {

            $("#tabela").html("<span>Carregando...</span>")
        },
        success: function (data) {

            let pessoa = JSON.parse(data);
            $("#tabela").append("<table class='table table-striped table-bordered' id='tabela-pessoa'>");
            $("#tabela-pessoa").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>Quantidade</th><th>Valor total</th><th>Ações</th></tr></thead>");
            $("#tabela-pessoa").append("<tbody><tr class='linha-" + pessoa.id_pessoa + "'>" + "<td>" + pessoa.id_pessoa + "</td>"
                    + " <td>" + pessoa.nome + "</td>" + "<td>" + pessoa.cpf + "</td>" + "<td>" + pessoa.telefone + "</td>"
                    + " </td><td><button class='btn btn-info' id='botao-editar' value='" + pessoa.id_pessoa + "'><span class='glyphicon glyphicon-pencil'></span></button>"
                    + " <button class='btn btn-info' id='botao-visualizar'><span class='glyphicon glyphicon-search'></span></button>"
                    + " <a class='btn btn-danger modalExcluir' id='" + pessoa.id_pessoa + "' data-toggle='modal' data-target='#modalExcluir'><span class='glyphicon glyphicon-remove'></span></a></td></tr></tbody>");


        },
        error: function (error) {

            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });

    //$("#listar-emprestimo").prop("disabled", true);
});

/* PEGA PESSOA */

$("#pega-pessoa").on("submit", function (e) {

    e.preventDefault();
    let dados = $(this).serialize();
    $.ajax({
        url: "index.php?action=buscar&modulo=Pessoa&control=Json",
        type: "post",
        data: dados,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Carregando...</span>")
        },
        success: function (data) {

            let pessoa = JSON.parse(data);
            alert(pessoa.nome);
            $("#id_pessoa").val(pessoa.id_pessoa);
            $("#nome").val(pessoa.nome);
            $("#pega-pessoa #nome-pessoa").val('');

        },
        error: function (error) {

            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });

    //$("#listar-emprestimo").prop("disabled", true);
});

/* INSERIR COTA */

$("#form-cota").on("submit", function (e) {

    e.preventDefault();
    let dados = $(this).serialize();
    $.ajax({
        url: "./index.php?action=inserir&modulo=Cota",
        type: "post",
        data: dados,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Salvando...</span>")
        },
        success: function (data) {
            $("#tabela").html("<div class='alert alert-success'>" + JSON.parse(data) + "</div>");
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

/* INSERIR PESSOA */

$("#form-pessoa").on("submit", function (e) {
    e.preventDefault();
    let formDados = $(this).serialize();
    $.ajax({
        url: "./index.php?action=inserir&modulo=Pessoa&control=Json",
        type: "post",
        data: formDados,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Carregando...</span>")
        },
        success: function (data) {

            if (data) {
                $("#tabela").html("<div class='alert alert-success'>" + JSON.parse(data) + "</div>");
                $("#nome").val("");
                $("#cpf").val("");
                $("#rg").val("");
                $("#endereco").val("");
                $("#bairro").val("");
                $("#telefone").val("");
                $("#email").val("");
            }
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }
    });
});

/* INSERIR EMPRESTIMO */

$("#form-emprestimo").on("submit", function (e) {

    e.preventDefault();
    let formDados = $(this).serialize();
    $.ajax({
        url: "./index.php?action=inserir&modulo=Emprestimo&control=Json",
        type: "post",
        data: formDados,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Carregando...</span>")
        },
        success: function (data) {

            if (data) {
                $("#tabela").html("<div class='alert alert-success'>" + JSON.parse(data) + "</div>");
                $("#nome").val("");
                $("#cpf").val("");
                $("#rg").val("");
                $("#endereco").val("");
                $("#bairro").val("");
                $("#telefone").val("");
                $("#email").val("");
            }
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }
    });





});

$("#form_batida").on("submit", function (e) {
    e.preventDefault();

    let dados = $("#form_batida").serialize();
    console.log(dados);
    batidas(dados);
});

function listaEquipamentos() {
    $.ajax({
        url: "./index.php?action=lista&modulo=Equipamento&control=Json",
        type: "post",
        dataType: "json",

        success: function (data) {
            let equipamentos = JSON.parse(data);
            let e;

            $("#form_batida #equipamentos").append("<select name='id_equipamento' class='form-control' style='width: 300px;' id='id_equipamento' >");
            $("#id_equipamento").append("<option value=''>Selecione um equipamento</option>");
            for (e in equipamentos) {
                let equipamento = equipamentos[e];
                $("#id_equipamento").append('<option value="' + equipamento.nr_equipamento + '">' + equipamento.nm_equipamento + '</option>');
            }

        }
    });
}

function batidas(dados) {

    $.ajax({
        url: "./index.php?action=listar&modulo=Batida&control=Json",
        type: "post",
        data: dados,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Carregando...</span>");
        },
        success: function (data) {
            $("#tabela").html("");
            let batidas = JSON.parse(data);
            $("#tabela").append("<table class='table table-striped table-bordered' id='tabela-batida'>");
            $("#tabela-batida").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>BATIDA</th><th>SIAPE</th><th>Equipamento</th><th>Nº EQ.</th><th>Ações</th></tr></thead>");
            let b;
            for (b in batidas) {
                let batida = batidas[b];
                //console.log(batida);
                dados_batida = batida;
                $("#tabela-batida").append("<tbody><tr class='linha-" + batida.id_registro_pessoa + "'>" + "<td>" + batida.id_registro_pessoa + "</td>"
                        + " <td>" + batida.nm_pessoa + "</td>" + "<td>" + batida.dt_registro + "</td>" + "<td>" + batida.nr_matricula + "</td> "
                        + "<td>" + batida.nm_equipamento + "</td>" + "<td>" + batida.nr_equipamento + "</td> "
                        + " </td><td><button class='btn btn-info' id='btn-ajuste'><span class='glyphicon glyphicon-pencil'></span></button>"
                        + " <button class='btn btn-info' id='botao-visualizar-batidaSig'><span class='glyphicon glyphicon-search'></span></button>"
                        + " <a class='btn btn-danger modalExcluir' id='" + batida.id_registro_pessoa + "' data-toggle='modal' data-target='#modalExcluir'><span class='glyphicon glyphicon-remove'></span></a></td></tr></tbody>");

            }
            //$("#buscar-batidas").hide();
            $("#tabela").append("</table>");
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
            setTimeout(function () {
                $("#tabela").html('');
            }, 10000);


        }


    });
}

$("#tabela").on("click", "#botao-visualizar-batidaSig", function (e) {
    e.preventDefault();
    //let dados_batida = $(this).serialize();
    batidasSig(dados_batida);
});

$("#form-batidasSig").on("submit", function (e) {

    e.preventDefault();
    let dados_batida = $(this).serialize();
    console.log(dados_batida);
    batidasSig(dados_batida);
});

function getServidor() {

}


function batidasSig(dados) {

    $.ajax({
        url: "./index.php?action=listaSig&modulo=Batida&control=Json",
        type: "post",
        data: dados,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Carregando...</span>");
        },
        success: function (data) {
            $("#tabela").html("");
            let batidas = JSON.parse(data);
            $("#tabela").append(" <table class='table table-striped table-bordered' id='tabela-batida'>");

            $("#tabela-batida").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>Entrada</th><th>Saida</th><th>SIAPE</th><th>Equipamento</th><th>Saida Almoco</th><th>Ações</th></tr></thead>");
            let b;
            for (b in batidas) {
                let batida = batidas[b];
                //console.log(batida);
                dados_batida = batida;
                $("#tabela-batida").append("<tbody><tr class='linha-" + batida.id_horario_ponto + "'>" + "<td>" + batida.id_horario_ponto + "</td>"
                        + " <td>" + batida.nome + "</td>" + "<td>" + batida.entrada_informada + "</td>" + "<td>" + batida.saida_informada + "</td>" + "<td>" + batida.siape + "</td>"
                        + " <td>" + batida.observacoes + "</td>" + "<td>" + batida.saida_almoco + "</td> "
                        + " </td><td><button class='btn btn-info' id='btn-ajuste'><span class='glyphicon glyphicon-pencil'></span></button>"
                        + " <button class='btn btn-info' id='botao-visualizar'><span class='glyphicon glyphicon-search'></span></button>"
                        + " <a class='btn btn-danger modalExcluir' id='" + batida.id_horario_ponto + "' data-toggle='modal' data-target='#modalExcluir'><span class='glyphicon glyphicon-remove'></span></a></td></tr></tbody>");

            }
            $("#tabela").append("</table>");
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
            setTimeout(function () {
                $("#tabela").html('');
            }, 10000);


        }

    });
}


$("#tabela").on("click", "#btn-ajuste", function (event) {

    event.preventDefault();
    console.log(dados_batida);
    $("#tabela").append("<div  style='text-align: left' id='form-ajuste'>"
            + "<form id='ajuste-batida' method='post'>"
            + "<input type='hidden' name='id_registro_pessoa' id='id_registro_pessoa' value='" + dados_batida.id_horario_ponto + "'>"
            + "<div class='form-group col-3'><label for=''>Nome</label><input style='width: 360px' type='text' id='nome' class='form-control' name='nome' value='" + dados_batida.nome + "' ></div>"
            + "<div class='form-group col-3'><label for=''>Entrada</label><input style='width: 160px' type='text' id='batida' class='form-control' value='" + dados_batida.entrada_informada + "' name='entrada' ></div>"
            + "<div class='form-group col-3'><label for=''>Saida</label><input style='width: 160px' type='text' id='batida' class='form-control' value='" + dados_batida.saida_informada + "' name='saida' ></div>"
            + "<div class='form-group col-3'><label for=''>Siape</label><input style='width: 160px' type='text' id='matricula' class='form-control' value='" + dados_batida.siape + "' name='matricula' ></div>"
            + "<button type='submit' class='btn btn-primary'>Gravar</button>"
            + "<form/><div/>");


});

$("teste").on("submit", function (ev) {
    alert("teste")
});


$("#tabela").on("submit", "#ajuste-batida", function (ev) {
    ev.preventDefault();
    if (confirm('Atualização de horário')) {

        let dados = $(this).serialize();

        $.ajax({
            url: "./index.php?action=update&modulo=Batida&control=Json",
            type: "post",
            data: dados,
            dataType: "json",
            beforeSend: function () {

                $("#tabela").html("<span>Salvando...</span>");
            },
            success: function (data) {

                $("#tabela").html("<div class='alert alert-success'>Atualização cocluida com sucesso!</div>");
                $("#tabela").html("");
                let batidas = JSON.parse(data);
                $("#tabela").append("<table class='table table-striped table-bordered' id='tabela-batida'>");
                $("#tabela-batida").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>BATIDA</th><th>SIAPE</th><th>Ações</th></tr></thead>");
                for (b in batidas) {
                    let batida = batidas[b];
                    console.log(batida);
                    dados_batida = batida;
                    $("#tabela-batida").append("<tbody><tr class='linha-" + batida.id_registro_pessoa + "'>" + "<td>" + batida.id_registro_pessoa + "</td>"
                            + " <td>" + batida.nm_pessoa + "</td>" + "<td>" + batida.dt_registro + "</td>" + "<td>" + batida.nr_matricula + "</td>"
                            + " </td><td><button class='btn btn-info' id='btn-ajuste'><span class='glyphicon glyphicon-pencil'></span></button>"
                            + " <button class='btn btn-info' id='botao-visualizar'><span class='glyphicon glyphicon-search'></span></button>"
                            + " <a class='btn btn-danger modalExcluir' id='" + batida.id_registro_pessoa + "' data-toggle='modal' data-target='#modalExcluir'><span class='glyphicon glyphicon-remove'></span></a></td></tr></tbody>");

                }
                $("#tabela").append("</table>");

            },
            error: function (error) {
                $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
            }
        });

        alert('Alteração realizada!');

    } else {
        alert('Cancelado!');
    }
});









  