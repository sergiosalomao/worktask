/*Salvar */
$(document).ready(function () {

});
    $('#formulario-tipo-usuario').submit(function () {
        $("#tela-aguarde").show();
        $("#msginfo").show();
        $.ajax({
            url: "frmTipoUsuarios/ajax/salva.php",
            type: "post",
            dataType:"html",
            async: false,
            data: $('#formulario-tipo-usuario').serialize(),
            success:
                function (response) {
                    $('#lista').html(response);
                                 if ($.parseJSON(response)['retorno'] == 'incompleto') {
                        <!--se o retorno for incompleto-->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').addClass($.parseJSON(response)['classe'])
                            .html($.parseJSON(response)['mensagem'])
                            .css({"padding": "10px"})
                    } else if ($.parseJSON(response)['retorno'] == 'salvo') {
                        <!--se o retorno for salvo-->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(response)['classe'])
                            .html($.parseJSON(response)['mensagem'])
                            .css({"padding": "10px"})
                        /*atualiza*/

                    }
                    else if ($.parseJSON(response)['retorno'] == 'atualizado') {
                        <!--se o retorno for atualizado-->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(response)['classe'])
                            .html($.parseJSON(response)['mensagem'])
                            .css({"padding": "10px"})
                      //  location.reload('../frames/list.php');
                    }
                    else {
                        <!--se o nao houver retorno -->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(response)['classe'])
                            .html($.parseJSON(response)['mensagem'])
                            .css({"padding": "10px"})
                    }
                }
        })
        /*Limpa o campo*/
        $('#descricao').val(null)
        $('#obs').val(null)

        /*seta o focus*/
        $('#descricao').focus()
        return false;	//Evita que a página seja atualizada
    })


/*Excluir;*/

/*pega o id do item selecionado e coloca na variavel globa id*/
var id;
$('.btn-delete').click(function () {

    alert(id);

    id = $(this).attr("id"); //pega o id do registro clicado

    /*pega o evendo onclick do modal que encontrase no janelas modal_conforma_exclusao*/
    $("#btn-sim").click(function () {

        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: "frmTipoUsuarios/ajax/deletar.php",
            async: false,
            data: {id: id},
            success: function (response) {

                $('#lista').html(response)

            }
        })
        return false;
    })
});

/*Editar;*/

$('.btn-edit').click(function () {

    var id = $(this).attr("id"); //pega o id do registro clicado
    $("#btn-lista").click();

   $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "frmTipoUsuarios/ajax/procurarPorId.php",
        async: false,
        data: {id: id},
        success: function (response) {
            // alert(id);
             $("#descricao").val(response.descricao);
             $("#obs").val(response.obs);
        }
    })

});

/*Listar Todos*/
$('#btn-lista').click(function () {
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: "frmTipoUsuarios/ajax/listarTodos.php",
        async: false,
        success:
            function (response) {
                $('#lista').html(response)
            }
    })
    return false;
})













