function addAutocomplete(jquerySelector, route) {
    $(jquerySelector).autocomplete({
        source: route,
        minLength: 2,
        autoFocus:true,
        select:function(e,ui)
        {
            $(jquerySelector).val(ui.item.value);
        }
    });
}