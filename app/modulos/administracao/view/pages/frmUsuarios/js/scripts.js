/*Funcoes do botao mostrar e esconder os frames*/
function mostrarLista() {

    /*Mostra Relatorio*/
    if (document.getElementById('btn-lista').innerText == "Listar") {
        document.getElementById('btn-lista').innerText = "Novo"
        $("#relatorio").show("slideToggle");
        $("#formulario-usuario").hide("slideToggle");
        $("#btn-salvar").hide("slideToggle");
        document.getElementById('titulo').innerText = "Relatorio dos Usuarios"
    }

    else {
        /*Mostra Formulario*/
        if (document.getElementById('btn-lista').innerText == "Novo") {
            document.getElementById('btn-lista').innerText = "Listar";
            $("#relatorio").hide("slideToggle");
            $("#formulario-usuario").show("slideToggle");
            $("#btn-salvar").show("slideToggle");
            document.getElementById('titulo').innerText = "Usuarios"
            $("#formulario-usuario input,select").val(null);
        }
    }
    ListarTodos();
}

/*Funcao do botao salvar */
function salvar() {
    $("#formulario-usuario").submit();
    ListarTodos();
}


