@extends('layouts.admin')
@section('page-title')
    @if (Request::segment(1) == 'daily-sale-report')
        {{ __('Daily Sale Reports') }}
    @else
        {{ __('Product Sale Reports') }}
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
                            <th>{{ __('Customer') }}</th>
                            <th>{{ __('Driver') }}</th>
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
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->driver->name }}</td>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ $sale->rate }}</td>
                                <td>{{ $sale->vat }}</td>
                                <td>{{ $sale->getTotal() + $sale->vat }}</td>

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
