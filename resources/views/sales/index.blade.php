@extends('layouts.admin')
@section('page-title')
    {{ __('Manage Customers Price Sales') }}
@endsection

@section('action-button')
    <div class="row d-flex justify-content-end">
        @can('create product & service')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
                <div class="all-button-box">
                    <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto"
                        data-url="{{ route('sale.create', 0) }}" data-ajax-popup="true"
                        data-title="{{ __('Create New Price Sale') }}">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>

                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
                <div class="all-button-box">
                    <a href="#" onclick="$('#sales_form').submit();" id="bulk_action_btn"
                        class="btn btn-xs btn-white btn-icon-only width-auto"
                        data-title="{{ __('Print Inovice Selected Sales') }}">
                        <i class="fa fa-print"></i> {{ __('Print Selected') }}
                    </a>

                </div>
            </div>
        @endcan
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
            {{-- <div class="all-button-box">

                <a href="{{ route('driver.export') }}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-file-excel"></i> {{ __('Export') }}
                </a>

            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
            <div class="all-button-box">
                <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto"
                    data-url="{{ route('car.file.import') }}" data-ajax-popup="true"
                    data-title="{{ __('Import product CSV file') }}">
                    <i class="fa fa-file-csv"></i> {{ __('Import') }}
                </a>
            </div>
        </div> --}}
        </div>
    @endsection

    @push('script-page')
        <script>
            function setDataTable() {
                var filename = 'شركة الهداية لنقل مواد البناء ذ.م.م<br> AL-HIDAYAH BLDG. MAT. TR. CO. LLC. '
                $('.dataTable').DataTable({
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
        </script>

        <script></script>
    @endpush


    @section('content')
        <div class="row">
            <div class="col-12">
                <form action="{{ route('sale.bulk_print') }}" method="GET" id="sales_form">
                    @csrf
                    <div class="card">
                        <div class="card-body py-0">

                            <div class="table-responsive">
                                <table class="table table-striped mb-0 dataTable" id="myTable">
                                    <thead>
                                        <tr role="row">
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Inovice No') }}</th>
                                            <th>{{ __('Customer') }}</th>
                                            <th>{{ __('Driver') }}</th>
                                            <th>{{ __('Product') }}</th>
                                            <th>{{ __('Quantity') }}</th>
                                            <th>{{ __('Rate') }}</th>
                                            <th>{{ __('Vat') }}</th>
                                            <th>{{ __('Total') }}</th>
                                            <th>{{ __('Location') }}</th>
                                            <th>{{ __('LPO') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($sales as $sale)
                                            <tr class="font-style">
                                                <td>{{ $i }} &nbsp; <input type="checkbox"
                                                        name="id[{{ $i++ }}]" value="{{ $sale->id }}"></td>
                                                <td>{{ Auth::user()->invoiceNumberFormat($sale->id) }}</td>
                                                <td>{{ $sale->customer->name }}</td>
                                                <td>{{ $sale->driver->name }}</td>
                                                <td>{{ $sale->product->name }}</td>
                                                <td>{{ $sale->quantity }}</td>
                                                <td>{{ $sale->rate }}</td>
                                                <td>{{ $sale->vat }}</td>
                                                <td>{{ $sale->getTotal() + ($sale->vat / 100) * $sale->getTotal() }}
                                                </td>
                                                <td>{{ $sale->location }}</td>
                                                <td>{{ $sale->lpo }}</td>
                                                <td>{{ $sale->date }}</td>

                                                @if (Gate::check('edit product & service') || Gate::check('delete product & service'))
                                                    <td class="Action">
                                                        @can('edit product & service')
                                                            <a href="{{ route('sale.print', $sale->id) }}" class="edit-icon"
                                                                data-original-title="{{ __('Print') }}">
                                                                <i class="fas fa-print"></i>
                                                            </a>
                                                            <a href="#" class="edit-icon"
                                                                data-url="{{ route('sale.edit', $sale->id) }}"
                                                                data-ajax-popup="true" data-title="{{ __('Edit Price sale') }}"
                                                                data-toggle="tooltip"
                                                                data-original-title="{{ __('Edit') }}">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        @endcan
                                                        <a href="#" class="delete-icon " data-toggle="tooltip"
                                                            data-original-title="{{ __('Delete') }}"
                                                            data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                            data-confirm-yes="document.getElementById('delete-form-{{ $sale->id }}').submit();">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['sale.destroy', $sale->id],
                                                            'id' => 'delete-form-' . $sale->id,
                                                        ]) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endsection
