/*Funcoes do botao mostrar e esconder os frames*/
function mostrarLista() {

    /*Mostra Relatorio*/
    if (document.getElementById('btn-lista').innerText == "Mostrar Relatorio") {
        document.getElementById('btn-lista').innerText = "Mostra Formulario"
        $("#relatorio").show("slideToggle");
        $("#form").hide("slideToggle");
        $("#btn-salvar").hide("slideToggle");
        document.getElementById('titulo').innerText = "Relatorio dos Tipos de Usuarios"
    }

    else {
        /*Mostra Formulario*/
        if (document.getElementById('btn-lista').innerText == "Mostra Formulario") {
            document.getElementById('btn-lista').innerText = "Mostrar Relatorio";
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
}


