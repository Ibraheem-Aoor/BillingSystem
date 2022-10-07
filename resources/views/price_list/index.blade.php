@extends('layouts.admin')
@section('page-title')
    {{ __('Manage Customers Price Lists') }}
@endsection

@section('action-button')
    <div class="row d-flex justify-content-end">
        @can('create product & service')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
                <div class="all-button-box">
                    <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto"
                        data-url="{{ route('price-list.create', 0) }}" data-ajax-popup="true"
                        data-title="{{ __('Create New Price List') }}">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
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

    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-0">

                        <div class="table-responsive">
                            <table class="table table-striped mb-0 dataTable">
                                <thead>
                                    <tr role="row">
                                        <th>{{ __('S') }}</th>
                                        <th>{{ __('Customer') }}</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Selling Price') }}</th>
                                        <th>{{ __('Vat Value') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($lists as $list)
                                        <tr class="font-style">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $list->customer->name }}</td>
                                            <td>{{ $list->product->name }}</td>
                                            <td>{{ $list->selling_price }}</td>
                                            <td>{{ $list->vat }}</td>

                                            @if (Gate::check('edit product & service') || Gate::check('delete product & service'))
                                                <td class="Action">
                                                    @can('edit product & service')
                                                        <a href="#" class="edit-icon"
                                                            data-url="{{ route('price-list.edit', $list->id) }}"
                                                            data-ajax-popup="true" data-title="{{ __('Edit Price List') }}"
                                                            data-toggle="tooltip" data-original-title="{{ __('Edit') }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete product & service')
                                                        <a href="#" class="delete-icon " data-toggle="tooltip"
                                                            data-original-title="{{ __('Delete') }}"
                                                            data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                            data-confirm-yes="document.getElementById('delete-form-{{ $list->id }}').submit();">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['price-list.destroy', $list->id],
                                                            'id' => 'delete-form-' . $list->id,
                                                        ]) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
