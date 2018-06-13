/*
Opcao Salvar:
==============================
Parametros de retorno do Json
retorno, classe, mensagem, lista(ListaTodos),
*/

$('#formulario-tipo-usuario').submit(function () {
    $("#msginfo").show();
    $.ajax(
        {
            url: "frmTipoUsuarios/ajax/salva.php",
            type: "post",
            dataType: "json",
            async: false,
            data: $('#formulario-tipo-usuario').serialize(),
            success: function (response) {

                if (response.retorno == 'incompleto') {
                    setTimeout(function () {
                        $("#msginfo").hide();
                    }, 5000);
                    $('#msginfo').addClass(response.classe).html(response.mensagem)
                }

                else if (response.retorno == 'salvo') {
                    $("#tela-aguarde").hide();
                    setTimeout(function () {
                        $("#msginfo").hide();
                    }, 5000);
                    $('#msginfo').removeClass();

                    $('#msginfo').addClass(response.classe)
                        .html(response.mensagem)
                }

                else if (response.retorno == 'atualizado') {
                    $("#tela-aguarde").hide();

                    setTimeout(function () {
                        $("#msginfo").hide();
                    }, 5000);
                    $('#msginfo').removeClass();
                    $('#msginfo').addClass(response.classe)
                        .html(response.mensagem)
                }
                else {
                    $("#tela-aguarde").hide();

                    setTimeout(function () {
                        $("#msginfo").hide();
                    }, 5000);
                    $('#msginfo').removeClass();
                    $('#msginfo').addClass(response.classe)
                        .html(mensagem)
                }
            }
        })
    /*Limpa o campo*/
    $('#descricao').val(null)
    $('#obs').val(null)

    /*seta o focus*/
    $('#descricao').focus()
    return false;	//Evita que a página seja atualizada
});

/*
Opcao Excluir:
==============================
Parametros de retorno do Json
retorno, classe, mensagem, lista(ListaTodos), registros(numero de registros)
*/
function deletaPorId(id) {
    /*pega o evendo onclick do modal que encontrase no janelas modal_conforma_exclusao*/
    $("#btn-sim").click(function () {

        $("#msginfo").show();

        if (id != null)
        {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "frmTipoUsuarios/ajax/deletar.php",
                async: true,
                data: {id: id},
                success: function (response) {
                    id = null;
                    <!--se o retorno for excluido-->
                    if (response.retorno == 'excluido') {
                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').addClass(response.classe)
                            .html(response.mensagem)

                        $('#lista').html(response.lista)
                    }
                    else if (response.retorno == 'error') {
                        <!--se o retorno for error-->
                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').addClass(response.classe)
                            .html(response.mensagem)
                    }
                }
            })
        }
    })
}

/*Opcao Editar:
==============================
Parametros de retorno do Json
retorno, classe, mensagem,
*/
function editar(id) {
    var selecionado = id;
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "frmTipoUsuarios/ajax/procurarPorId.php",
        async: false,
        data: {id: selecionado},
        success: function (response) {
            /*alimenta os campos*/
            $("#descricao").val(response.descricao.trim());
            $("#obs").val(response.obs.trim());

            /*Mostra o formulario*/
            document.getElementById('btn-lista').innerText = "Mostrar Relatorio";
            $("#relatorio").hide("slideToggle");
            $("#form").show("slideToggle");
            $("#btn-salvar").show("slideToggle");
            document.getElementById('titulo').innerText = "Tipos de Usuarios"
        }
    })
    return false
}


/*
Opcao Listar Todos:
==============================
Parametros de retorno do Json
retorno, classe, mensagem, lista(ListaTodos), registros(numero de registros)
*/

$('#btn-lista').click(function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "frmTipoUsuarios/ajax/listarTodos.php",
        success:
            function (response) {
                $('#lista').html(response.lista)
            }
    })
    return false;
})