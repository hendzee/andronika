$(document).ready(function(){
    $('th').each(function(){
        $(this)
        .removeAttr('style')            
    });

    $('th:first').attr('style', 'min-width:150px');

    //curency on create and edit page
    $('.masking-form').keypress(function () {
        var total = $(this);

        total.mask('000,000,000,000,000', { reverse: true });

        total.change(function (e) {
            $('.masking-form-hidden').val(total.cleanVal())
        });
    });

   checkMasking();
});

function checkMasking()
{
    var total = $('.masking-form');

    if (total.val().length !== 0) {
        total.mask('000,000,000,000,000', { reverse: true });
        $('.masking-form-hidden').val(total.cleanVal());
    } 
}