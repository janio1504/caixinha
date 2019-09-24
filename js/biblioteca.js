
$("#busca-pessoa-biblioteca").on("submit", function (e) {
    e.preventDefault();
    let dados = $(this).serialize();
    getPessoa(dados);
});

function getPessoa(dados){
    
    $.ajax({
        url: "index.php?action=getPessoa&modulo=Biblioteca&control=Json",
        type: "post",
        data: dados,
        dataType: "json",
        beforeSend: function () {

            $("#tabela").html("<div id='carregando'><span>Carregando...</span></div>");
        },
        success: function (data) {
            $("#carregando").html("");
          
            let pessoa = JSON.parse(data);
            $("#tabela").append("<table class='table table-striped table-bordered' id='tabela-pessoa'>");
            $("#tabela-pessoa").append("<thead class='thead-light'><tr><th>Id</th><th>Nome</th><th>CPF</th><th>Valido academico</th><th>Valido comum</th><th class='acao'>Ações</th></tr></thead>");
          
            $("#tabela-pessoa").append("<tbody><tr class='linha-" + pessoa.id_pessoa + "'>" + "<td>" + pessoa.id_pessoa + "</td>"
                    + " <td>" + pessoa.nome + "</td>" + "<td>" + pessoa.cpf_cnpj + "</td>" + "<td>" + pessoa.valido + "</td>"+ "<td>" + pessoa.valido_comum + "</td>"
                    + " </td><td class='acao'><button class='btn btn-info valido' id='"+ pessoa.cpf_cnpj +"'>Validar <span class='glyphicon glyphicon-pencil'></span></button></td></tr>"
                 );
                   
            if(pessoa.valido){
               // $(".acao").hide();
            }

        
    },
        error: function (error) {

            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }

    });
      
}

/* MUDA PARA VALIDO NA TABELA PESSOA DO DB COMUM E ADMINISTRATIVO */

$("#tabela").on("click", ".valido", function(e){
    e.preventDefault();    
    let dados = {'cpf':this.id};   
    $.ajax({
        url: "index.php?action=discenteValido&modulo=Biblioteca&control=Json",
        type:"post",
        data: dados,
        dataType:"json",       
        success: function(data){ 
            getPessoa(dados);
            let sucesso = JSON.parse(data);           
            $("#tabela").html("<span id='alerta'><div class='alert alert-success'>" + sucesso + "</div></span>");            
           
        },
        error: function (error) {
            $("#tabela").html("<div class='alert alert-danger'>" + error.responseText + "</div>");
        }
        
    });
});


