function carregarMenuPrincipal() {
    $.getJSON('painelControle/menu-painel-controle.json', function(data) {
        var elemento;

        elemento = "<ul>";
        $.each(data, function(i, valor) {

            elemento += "<form method='POST' ><input name='frm' type='submit' value='" + valor.nome + "'>"
            elemento += "<input name='link' type='hidden' value='" + valor.link + "'></form>"
        });
        elemento += "</ul>";
        $('div#div-menu-dashboard').html(elemento);
    });
}
