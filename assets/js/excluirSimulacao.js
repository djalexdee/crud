function excluirSimulacao($id){    
    var id = $id;
    $("#btExcluirSimulacao").html('<button type="button" title="Excluir" class="btn btn-danger" onclick="confirmarExclusaoSimulacao('+id+');">Excluir</button>');    
}

function confirmarExclusaoSimulacao($id){
    var id = $id;
    $.post("excluirSimulacao/"+id,
        function (data) {
            window.setTimeout('location.reload()', 500);
    }, "html");
}