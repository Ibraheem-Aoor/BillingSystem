@extends('layouts.admin')
@section('page-title')
    @if (Request::segment(1) == 'customer-statement-report')
        {{ __('Customer Statement Reports') }}
    @elseif (Request::segment(1) == 'customer-ledger-report')
        {{ __('Customer Ledger Reports') }}
    @endif
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
        @if ($request_segment == 'customer-statement-report' || $request_segment == 'customer-ledger-report')
            <div class="col-sm-3">
                <form action="{{ $form_action }}" id="produt_sale_filter_form">
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
                <form action="{{ route('report.product_sale_filter') }}" id="produt_sale_filter_form">
                    <div class="all-select-box">
                        <div class="btn-box">
                            <label for="" class="text-type">Product</label>
                            <select name="product_id" class="month-btn form-control">
                                <option value="">--select product--</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                        <label for="" class="text-type">&nbsp;</label>
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
                        <tr role="row">
                            @if ($request_segment == 'customer-statement-report')
                                <th>{{ __('S.No') }}</th>
                                <th>{{ __('Invoice') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Cash') }}</th>
                                <th>{{ __('Residual') }}</th>
                                <th>{{ __('Total') }}</th>
                            @elseif($request_segment == 'customer-ledger-report')
                                <th>{{ __('S.No') }}</th>
                                <th>{{ __('Invoice') }}</th>
                                <th>{{ __('Product') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Qty') }}</th>
                                <th>{{ __('Rate') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('Vat') }}</th>
                            @endif
                        </tr>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
