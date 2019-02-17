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
            extend: "copy",
            className: "btn red btn-outline"
        }, {
            extend: "pdf",
            className: "btn green btn-outline"
        }, {
            extend: "excel",
            className: "btn yellow btn-outline "
        }, {
            extend: "csv",
            className: "btn purple btn-outline "
        }, {
            extend: "colvis",
            className: "btn dark btn-outline",
            text: "Columns"
        }],
        columnDefs: [{ 
            targets: 'no-sort', 
            orderable: false 
        }],  
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],
        pageLength: 5,
        dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
    })

    $("#sample_1_tools > li > a.tool-action").on("click", function () {
        var e = $(this).attr("data-action");
        $('#sample_1').DataTable().button(e).trigger()
    })

    $('.dt-buttons').hide();

    // LOGOUT
    $('#btn-logout').on('click', function(e){
        e.preventDefault();

        $('#logout-form').submit();
    });

    // CLIENT DELETE ALERT
    $('.form-del').each(function(){
        $(this).submit(function(e){
            e.preventDefault();
            
            var form = this;
            var data = "";

            switch ($(this).data("type")) {
                case "client":
                    data = "Data ini berkaitan dengan projek, transportasi dan peminjaman, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "project":
                    data = "Data ini berkaitan dengan pembayaran projek, barang kebutuhan projek, pembelian, pekerja harian dan pekerja kontrak, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "project-supply":
                    data = "Data ini berkaitan dengan pembelian barang di dalam projek, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "warehouse":
                    data = "Data ini berkaitan dengan penujalan barang dan peminjaman barang serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "warehouse-rent":
                    data = "Data ini berkaitan dengan pembayaran sewa, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "employee":
                    data = "Data ini berkaitan dengan gaji karyawan dan transportasi, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "salary-month":
                    data = "Data ini berkaitan dengan gaji bulanan, pengambilan gaji serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "salary-month-detail":
                    data = "Data ini berkaitan dengan projek, transportasi dan peminjaman, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "transportation":
                    data = "Data ini berkaitan dengan pembayaran transportasi, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;

                case "worker":
                    data = "Data ini berkaitan dengan pembayaran pekerja harian dan kontrak, serta tabel yang berkaitan dengan tabel-tabel tersebut, kami rekomendasikan anda mem-backupnya terlebih dahulu.";
                    break;
            
                default:
                    data = "";
                    break;
            }

            swal({
                title: "Data ini terhubung dengan data lain !",
                text: data,
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Batalkan",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Tetap hapus",
                closeOnConfirm: false
                },
                function (isTrue) {
                    if (isTrue) form.submit();
            });
        });
    });

    $('.error-del').each(function(){
        $(this).on('click', function(){
            swal({
                title: "ERROR!",
                text: "Anda tidak diberikan hak untuk melakukan aksi ini!",
                type: "error",
                confirmButtonClass: "btn-info",
                confirmButtonText: "Saya mengerti",
            });
        })
    });

    $('#form_change_password').submit(function (e) {
        e.preventDefault();

        var validated_retype = false;
        var group_retype = $('#group-retype');

        if ($('#new_password').val() === $('#retype').val()) {
            group_retype.addClass('has-success');
            group_retype.removeClass('has-error');
            $('#message').html('Password sama');
            validated_retype = true;
        } else {
            group_retype.addClass('has-error');
            group_retype.removeClass('has-success');
            $('#message').html('Password tidak sama');
            validated_retype = false;
        }

        if (validated_retype === true) {
            this.submit();
        }

    });
});

// check masking value on load page
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

function checkOldPassword() {
    $.ajax({
        url: "/check_old_password",
        type: "GET",
        data: $('#form_change_password').serialize(),

        success: function (data) {
            return data
        }

    });
}

