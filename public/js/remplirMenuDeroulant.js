function remplirMenuDeroulant(route, jqueryID) {
    var jqxhr = $.ajax({
        type: 'get',    // on n'a pas de paramètres à envoyer alors GET est sécuritaire
        url: route,
        dataType: "html",    // le fichier php fait un echo de code HTML
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        data: ""

    })
        .done(function (response, textStatus, jqXHR) {
            var response= JSON.parse(response)
            var optionList ;
            for (var i=0;i<response.length;i++) {
                optionList += "<option value="+response[i].id+">"+response[i].label+ "</option>";
            }
            $(jqueryID).html(optionList);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            $(jqueryID).html("<option value=''>Impossible de joindre le serveur</option>");
        });
}