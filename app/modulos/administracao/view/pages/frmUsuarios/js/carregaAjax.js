
$(document).ready(function () {

    $('#formulario-usuario').submit(function () {
        $("#tela-aguarde").show();
        $.ajax({
            url: "frmUsuarios/salvaUsuario.php",
            type: "post",
            data: $('#formulario-usuario').serialize(),
            success:
                function (result)
                {
                    if ($.parseJSON(result)['status'] == 'incompleto')
                    {
                        /*se o retorno for incompleto*/
                        $("#tela-aguarde").hide();

                        setTimeout(function(){ $("#msginfo").hide(); }, 5000);
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
                            .css({"padding": "10px"})
                    }
                    else if ($.parseJSON(result)['status'] == 'salvo')
                    {
                        /*se o retorno for salvo*/
                        $("#tela-aguarde").hide();

                        setTimeout(function(){ $("#msginfo").hide(); }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
                            .css({"padding": "10px"})

                    }
                    else if ($.parseJSON(result)['status'] == 'atualizado')
                    {
                        /*se o retorno for atualizado*/
                        $("#tela-aguarde").hide();

                        setTimeout(function(){ $("#msginfo").hide(); }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
                            .css({"padding": "10px"})
                    }
                    else
                    {
                        /*se nao houver retorno*/
                        $("#tela-aguarde").hide();

                        setTimeout(function(){ $("#msginfo").hide(); }, 5000);
                        $('#msginfo').removeClass();
                        $('#msginfo').addClass($.parseJSON(result)['classe'])
                            .html($.parseJSON(result)['mensagem'])
                            .css({"padding": "10px"})
                    }
                }
        })
        return false;	//Evita que a página seja atualizada
    })
})
