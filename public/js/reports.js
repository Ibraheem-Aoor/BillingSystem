$(document).ready(function () {
    // Ajax config
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    setDataTable();

    // DataTable
    function setDataTable() {

        var filename = $('#filename').val();
        $('#report-dataTable').DataTable({
            dom: 'lBfrtip',
            buttons: [{
                extend: 'excel',
                title: filename
            },
            {
                extend: 'pdf',
                title: filename
            }, {
                extend: 'csv',
                title: filename
            }
            ]
        });
    }

    //Start  Daily Sale Filter Ajax
    $('input[name="date"]').on('change', function () {
        $.ajax({
            url: $(this).attr('data-route'),
            type: 'GET',
            data: {
                date: $(this).val()
            },
            success: function (response) {
                if (response.status) {
                    $('#body').html(response.view);
                    setDataTable();
                }
            },
            error: function (response) {
            },
        });
    });
    // End Daily Sale Filter Ajax

    // Start product wise sale filter
    $(document).on('click', '#product_sale_filter', function () {
        var form = $('#produt_sale_filter_form');
        $.ajax({
            url: form.attr('action'),
            type: 'GET',
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    $('#body').html(response.view);
                    setDataTable();
                }
            },
            error: function (response) {
            },
        });
    });

    // End product wise sale filter



});
