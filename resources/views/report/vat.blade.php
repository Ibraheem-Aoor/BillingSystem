@extends('layouts.admin')
@section('page-title')
    Vat Report
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
    </script>
    <script src="{{ asset('js/reports.js') }}"></script>
@endpush
@section('content')

@section('action-button')
    <div class="row d-flex justify-content-end">
        @if ($request_segment == 'daily-sale-report')
            <div class="col-sm-4">
                <div class="all-select-box">
                    <div class="btn-box">
                        <label for="" class="text-type">Date</label>
                        <input data-route="{{ route('report.daily_sale.filter') }}" type="date"
                            class="month-btn form-control" name="date">
                    </div>
                </div>
            </div>
        @elseif($request_segment == 'customer-sale-report')
            <div class="col-sm-3">
                <form action="{{ route('report.customer_sale_filter') }}" id="produt_sale_filter_form">
                    <div class="all-select-box">
                        <div class="btn-box">
                            <label for="" class="text-type">Customer</label>
                            <select name="customer_id" class="month-btn form-control">
                                <option value="">--select customer--</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
        @else
            <div class="col-sm-3">
                <form action="{{ route('report.vat_filter') }}" id="produt_sale_filter_form">
            </div>
        @endif
        @if ($request_segment != 'daily-sale-report')
            <div class="col-sm-3">
                <div class="all-select-box">
                    <div class="btn-box">
                        <label for="" class="text-type">From Date</label>
                        <input type="date" class="month-btn form-control" name="from_date">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="all-select-box">
                    <div class="btn-box">
                        <label for="" class="text-type">To Date</label>
                        <input type="date" class="month-btn form-control" name="to_date">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="all-select-box">
                    <div class="btn-box">
                        <label for="" class="text-type">To Date</label>
                        <button type="button" id="product_sale_filter" class="btn-sm btn btn-outline-info form-control"
                            id="filter_products"><i class="fa fa-search"></i> Filter Products
                        </button>
                    </div>
                </div>
            </div>
            </form>
        @endif
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
                            <th>{{ __('Invoice') }}</th>

                            <th>{{ __('Customer') }}</th>
                            <th>{{ __('Cash') }}</th>
                            <th>{{ __('Residual') }}</th>
                            <th>{{ __('Amount') }}</th>
                            <th>{{ __('Vat') }}</th>
                            <th>{{ __('Total') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($sales as $sale)
                            <tr class="font-style">
                                <td>{{ $i++ }}</td>
                                <td>{{ AUth::user()->invoiceNumberFormat($sale->id) }}</td>
                                <td>{{ $sale->customer->name }}</td>
                                <td>0</td>
                                <td>{{ $sale->getTotal() }}</td>
                                <td>{{ $sale->getTotal() }}</td>
                                <td>{{ $sale->vat }}</td>
                                <td>{{$sale->getTotal() + ((float) $sale->vat / 100) * (float) $sale->rate }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
