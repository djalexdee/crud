function excluirInvestimento($id){    
    var id = $id;
    $("#btExcluir").html('<button type="button" title="Excluir" class="btn btn-danger" onclick="confirmarExclusao('+id+');">Excluir</button>');    
}

function confirmarExclusao($id){
    var id = $id;
    $.post("excluirInvestimento/"+id,
        function (data) {
            window.setTimeout('location.reload()', 500);
    }, "html");
}