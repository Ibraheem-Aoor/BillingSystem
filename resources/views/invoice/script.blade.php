<script src="{{ asset('assets/js/jquery.min.js?v=0.1') }} "></script>
<script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js?v=0.1') }}"></script>
<script>
    function closeScript() {
        setTimeout(function () {
            window.open(window.location, '_self').close();
        }, 1000);
    }
    $(window).on('load', function () {
        var element = document.getElementById('boxes');
        var opt = {
            filename: '{{App\Models\Utility::customerInvoiceNumberFormat($invoice->invoice_id)}}',
            image: {type: 'jpeg', quality: 1},
            html2canvas: {scale: 2, dpi: 72, letterRendering: true},
            jsPDF: {unit: 'in', format: 'a4'}
        };
        html2pdf().set(opt).from(element).save().then(closeScript);
    });

</script>
