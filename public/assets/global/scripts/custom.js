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

    $('#sample_1').dataTable({
        language: {
            aria: {
                sortAscending: ": activate to sort column ascending",
                sortDescending: ": activate to sort column descending"
            },
            emptyTable: "Tidak ada data di dalam tabel",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Data tidak ditemukan",
            infoFiltered: "(filtered1 from _MAX_ total entries)",
            lengthMenu: "_MENU_ Data",
            search: "Cari:",
            zeroRecords: "Tidak ada data yang cocok"
        },
        buttons: [{
            extend: "print",
            className: "btn dark btn-outline"
        }, {
            extend: "pdf",
            className: "btn green btn-outline"
        }, {
            extend: "excel",
            className: "btn yellow btn-outline "
        }, {
            extend: "csv",
            className: "btn purple btn-outline "
        }],
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],
        pageLength: 5,
        dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
    })
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