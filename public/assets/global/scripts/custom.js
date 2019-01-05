$(document).ready(function(){
    $('th').each(function(){
        $(this)
        .removeAttr('style')            
    });

    $('th:first').attr('style', 'min-width:150px')
});