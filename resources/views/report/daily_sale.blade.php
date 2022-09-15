@extends('layouts.admin')
@section('page-title')
    {{ __('Daily Sale Reports') }}
@endsection

@push('script-page')
    <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jszip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pdfmake.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script>
        var filename = $('#filename').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 4,
                    dpi: 72,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A4'
                }
            };
            html2pdf().set(opt).from(element).save();

        }

        $(document).ready(function() {
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
        });
    </script>

    <script>
        $('input[name="date"]').on('change', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('report.daily_sale.filter') }}",
                type: 'GET',
                data: {
                    date: $(this).val()
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        $('#body').html(response.view);
                    }
                },
                error: function(response) {
                    console.log(response);
                },
            });
        });
    </script>
@endpush
{{-- @section('action-button')
    <div class="row d-flex justify-content-end">
        <div class="col">
            {{ Form::open(['route' => ['transaction.index'], 'method' => 'get', 'id' => 'transaction_report']) }}
            <div class="all-select-box">
                <div class="btn-box">
                    {{ Form::label('start_month', __('Start Month'), ['class' => 'text-type']) }}
                    {{ Form::month('start_month', isset($_GET['start_month']) ? $_GET['start_month'] : date('Y-m'), ['class' => 'month-btn form-control']) }}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="all-select-box">
                <div class="btn-box">
                    {{ Form::label('end_month', __('End Month'), ['class' => 'text-type']) }}
                    {{ Form::month('end_month', isset($_GET['end_month']) ? $_GET['end_month'] : date('Y-m', strtotime('-5 month')), ['class' => 'month-btn form-control']) }}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="all-select-box">
                <div class="btn-box">
                    {{ Form::label('account', __('Account'), ['class' => 'text-type']) }}
                    {{ Form::select('account', $account, isset($_GET['account']) ? $_GET['account'] : '', ['class' => 'form-control select2']) }}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="all-select-box">
                <div class="btn-box">
                    {{ Form::label('category', __('Category'), ['class' => 'text-type']) }}
                    {{ Form::select('category', $category, isset($_GET['category']) ? $_GET['category'] : '', ['class' => 'form-control select2']) }}
                </div>
            </div>
        </div>
        <div class="col-auto my-auto">
            <a href="#" class="apply-btn"
                onclick="document.getElementById('transaction_report').submit(); return false;" data-toggle="tooltip"
                data-original-title="{{ __('apply') }}">
                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
            </a>
            <a href="{{ route('transaction.index') }}" class="reset-btn" data-toggle="tooltip"
                data-original-title="{{ __('Reset') }}">
                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
            </a>
            <a href="#" class="action-btn" onclick="saveAsPDF()" data-toggle="tooltip"
                data-original-title="{{ __('Download') }}">
                <span class="btn-inner--icon"><i class="fas fa-download"></i></span>
            </a>
        </div>
    </div>

    {{ Form::close() }}
@endsection --}}

@section('content')

@section('action-button')
    <div class="row d-flex justify-content-end">
        <div class="col-sm-4">
            <div class="all-select-box">
                <div class="btn-box">
                    <label for="" class="text-type">Date</label>
                    <input type="date" class="month-btn form-control" name="date">
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" id="body">
                <table class="table table-striped mb-0" id="report-dataTable">
                    <thead>
                        <tr role="row">
                            <th>{{ __('S.No') }}</th>
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Rate') }}</th>
                            <th>{{ __('Vat') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th>{{ __('Location') }}</th>
                            <th>{{ __('LPO') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sales as $sale)
                            <tr class="font-style">
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ $sale->rate }}</td>
                                <td>{{ $sale->vat }}</td>
                                <td>{{ $sale->total }}</td>
                                <td>{{ $sale->location }}</td>
                                <td>{{ $sale->lpo }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
