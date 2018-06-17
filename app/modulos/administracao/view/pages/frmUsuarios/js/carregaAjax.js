/*Atualiza Registros*/
ListarTodos();


/*
Opcao Salvar:
==============================
Parametros de retorno do Json
retorno, classe, mensagem, lista(ListaTodos),
*/

$('#formulario-usuario').submit(function ()
{
    $("#msginfo").show();
    $.ajax(
        {
            url: "frmUsuarios/ajax/salva.php",
            type: "post",
            dataType: "json",
            async: false,
            data: $('#formulario-usuario').serialize(),
            success: function (response) {

                if (response.retorno == 'incompleto') {
                    setTimeout(function () {
                        $("#msginfo").hide();
                    }, 5000);
                    $('#msginfo').addClass(response.classe).html(response.mensagem)
                }

                else if (response.retorno == 'salvo') {
                    setTimeout(function () {
                        $("#msginfo").hide();
                    }, 5000);
                    $('#msginfo').removeClass();

                    $('#msginfo').addClass(response.classe)
                        .html(response.mensagem)
                }

                else if (response.retorno == 'atualizado') {
                    setTimeout(function () {
                        $("#msginfo").hide();
                    }, 5000);
                    $('#msginfo').removeClass();
                    $('#msginfo').addClass(response.classe)
                        .html(response.mensagem)
                }
                else {

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
    $('#formulario-usuario input,select').val(null)

    /*seta o focus*/
    $('#nome').focus()
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
                url: "frmUsuarios/ajax/deletar.php",
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

                        ListarTodos();
                    }
                    else if (response.retorno == 'error') {
                        <!--se o retorno for error-->
                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').addClass(response.classe)
                            .html(response.mensagem)
                    }
                    else {

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass(response.classe)

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
        url: "frmUsuarios/ajax/procurarPorId.php",
        async: false,
        data: {id: selecionado},
        success: function (response) {
            /*alimenta os campos*/
            $("#nome").val(response.nome.trim());
            $("#email").val(response.email.trim());
            $("#senha").val(response.senha.trim());
            $("#senha").val(response.senha.trim());
            $("#tipo_usuario_id").val(response.tipo_usuario_id);
            $("#status").val(response.status.trim());

            /*Mostra o formulario*/
            document.getElementById('btn-lista').innerText = "Mostrar Relatorio";
            $("#relatorio").hide("slideToggle");
            $("#formulario-usuario").show("slideToggle");
            $("#btn-salvar").show("slideToggle");
            document.getElementById('titulo').innerText = "Usuarios"
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

function ListarTodos() {

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "frmUsuarios/ajax/listarTodos.php",
        success:
            function (response) {
                $('#lista').html(response.lista)
                $('#totalReg').html("Total de Registros : " + response.registros)

            }
    })
    return false
}
