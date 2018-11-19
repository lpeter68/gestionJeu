
<div>
    <input type="button" class="type btn" name="hasard" id="hasard" value="@lang('contents.hasard')">
    <input type="button" class="type btn" name="strategie" id="strategie" value="@lang('contents.strategie')">
    <input type="button" class="type btn" name="des" id="des" value="@lang('contents.des')">
    <input type="button" class="type btn" name="cartes" id="cartes" value="@lang('contents.cartes')">
    <input type="button" class="type btn" name="adresse" id="adresse" value="@lang('contents.adresse')">
    <input type="button" class="type btn" name="questions" id="questions" value="@lang('contents.questions')">
    <input type="button" class="type btn" name="argent" id="argent" value="@lang('contents.argent')">
    <input type="button" class="type btn" name="lettres" id="lettres" value="@lang('contents.lettres')">
    <input type="button" class="type btn" name="chiffres" id="chiffres" value="@lang('contents.chiffres')">
    <input type="button" class="type btn" name="equipes" id="equipes" value="@lang('contents.equipes')">
    <input type="button" class="type btn" name="cooperation" id="cooperation" value="@lang('contents.cooperation')">
    <input type="button" class="type btn" name="memoire" id="memoire" value="@lang('contents.memoire')">
    <input type="button" class="type btn" name="point_victoire" id="point_victoire" value="@lang('contents.point_victoire')">
</div>

<script>
    const select = 'type btn btn-danger';
    const unselect = 'type btn';

    function loadType(jeu){
        $(".type").each(function() {
            var name =$(this).attr("name");
            if (jeu.hasOwnProperty(name) && jeu[name]){
                $(this).attr('class', select)
            }
        });
    }

    function convertTypeData(formSelector) {
        $(".type").each(function(){
            var value = $("<input>").attr("type", "hidden").attr("name", $(this).attr('name'));
            if($(this).attr('class') == select) value.val(1);
            else value.val(0);
            $(formSelector).append(value);
        })
    }

    $(".type").click(function(){
        if($(this).attr('class') == select) $(this).attr('class',unselect);
        else $(this).attr('class',select);
    });
</script>

<style>
    .type{
        margin-top:10px;
    }
</style>
