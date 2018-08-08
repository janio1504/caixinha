
</div>
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="js/jquery-maskmoney.js" type="text/javascript"></script>
<script src="js/main.js"></script>
<script src="js/action.js"></script>
<script type="text/javascript">
    $("#tabela-pessoa").on("click", "#botao-excluir" ,function (e){
    e.preventDefault();
    var tr = $(this).attr('id');
    
    $('#tabela-pessoa tr.'+tr).remove();
    
     alert("teste");   
}); 
</script>

</body>
</html>
