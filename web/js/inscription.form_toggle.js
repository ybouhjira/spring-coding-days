$(function(){
    showHideFieldset();
    $("input[name='equipe']","#inscrip-form").change(showHideFieldset);
});

function showHideFieldset() {
    var type = $("input[name='equipe']:checked","#inscrip-form").val();
    var fieldset = $("#fieldset-bin2");
    switch(type) {
        case 'binome':
            fieldset.stop().show('slow');
            break;
        case 'monome' :
            fieldset.stop().hide('slow');
            break;
    }
}
