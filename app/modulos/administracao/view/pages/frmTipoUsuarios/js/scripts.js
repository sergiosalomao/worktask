/*Funcoes do botao mostrar e esconder os frames*/
function mostrarLista() {

    /*Mostra Relatorio*/
    if (document.getElementById('btn-lista').innerText == "Listar") {
        document.getElementById('btn-lista').innerText = "Novo"
        $("#relatorio").show("slideToggle");
        $("#form").hide("slideToggle");
        $("#btn-salvar").hide("slideToggle");
        document.getElementById('titulo').innerText = "Relatorio dos Tipos de Usuarios"
    }

    else {
        /*Mostra Formulario*/
        if (document.getElementById('btn-lista').innerText == "Novo") {
            document.getElementById('btn-lista').innerText = "Listar";
            $("#relatorio").hide("slideToggle");
            $("#form").show("slideToggle");
            $("#btn-salvar").show("slideToggle");
            document.getElementById('titulo').innerText = "Tipos de Usuarios"

        }
    }
    ListarTodos();
}

/*Funcao do botao salvar */
function salvar() {
    $("#formulario-tipo-usuario").submit();
    ListarTodos();
}


