/*Salvar */
$(document).ready(function () {
    $('#formulario-tipo-usuario').submit(function () {
        $("#tela-aguarde").show();
        $("#msginfo").show();
        $.ajax({
            url: "frmTipoUsuarios/salva.php",
            type: "post",
            async: false,
            data: $('#formulario-tipo-usuario').serialize(),
            success:
                function (result) {

                    if ($.parseJSON(result)['status'] == 'incompleto') {
                        <!--se o retorno for incompleto-->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
                            .css({"padding": "10px"})
                    } else if ($.parseJSON(result)['status'] == 'salvo') {
                        <!--se o retorno for salvo-->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
                            .css({"padding": "10px"})
                    }
                    else if ($.parseJSON(result)['status'] == 'atualizado') {
                        <!--se o retorno for atualizado-->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
                            .css({"padding": "10px"})
                    }
                    else {
                        <!--se o nao houver retorno -->
                        $("#tela-aguarde").hide();

                        setTimeout(function () {
                            $("#msginfo").hide();
                        }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
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
});

/*Excluir;*/
var id;
$('.btn-delete').click(function () {
    //alert("clicou no delete");
    id = $(this).attr("id"); //pega o id do registro clicado
});
    $("#btn-sim").click(function () {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "frmTipoUsuarios/deleta.php",
            async: false,
            data: {id: id},
            success: function (response) {
               // alert(id);
                location.reload('../frames/list.php')
            }
     })
return false;
})








