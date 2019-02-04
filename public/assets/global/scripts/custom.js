$(document).ready(function(){
    $('th').each(function(){
        $(this)
        .removeAttr('style')            
    });

    $('th:first').attr('style', 'min-width:150px');

    //curency on create and edit page
    $('.form-group').each(function(){
        var group = $(this);

        $(this).find('.masking-form').keypress(function () {
            var total = $(this);

            
            total.mask('000,000,000,000,000', { reverse: true });
            
            total.change(function (e) {
                group.find('.masking-form-hidden').val(total.cleanVal())
            });
        });
    });

   checkMasking();
});

function checkMasking()
{
    $('.form-group').each(function(){
        var x = $(this).find('.masking-form');

        if (x.length > 0){
            x.mask('000,000,000,000,000', { reverse: true });
            $(this).find('.masking-form-hidden').val(x.cleanVal());
        }
    });
}