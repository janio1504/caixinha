/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("#migrar-servidor").on("submit", function (e) {

    e.preventDefault();
    let dados = $(this).serialize();
    $.ajax({
        url: "index.php?action=migrar&modulo=Servidor&control=Json",
        type: "post",
        data: dados,
        dataType: "json",
        beforeSend: function () {
            $("#tabela").html("<span>Carregando...</span>")
        },
        success: function (data) {
            let sucesso = JSON.parse(data);           
            $("#tabela").html("<span id='alerta'><div class='alert alert-success'>" + sucesso + "</div></span>");

        },
        error: function (error) {

            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });

    //$("#listar-emprestimo").prop("disabled", true);
});



