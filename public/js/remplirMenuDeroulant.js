function remplirMenuDeroulant(jquerySelector, route, selectedValue = null) {
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
                var selected = "";
                if(selectedValue!=null && i==selectedValue){
                    selected = " selected";
                }
                console.log(selectedValue + " " + i +" "+ selected);
                optionList += "<option value="+response[i].id + selected +">"+response[i].label+ "</option>";
            }+
            $(jquerySelector).html(optionList);
            $(jquerySelector).val(selectedValue);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            $(jquerySelector).html("<option value=''>Impossible de joindre le serveur</option>");
        });
}