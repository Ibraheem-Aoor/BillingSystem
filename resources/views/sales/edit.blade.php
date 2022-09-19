<div class="card bg-none card-box">
    {{ Form::model($sale, ['route' => ['sale.update', $sale->id], 'method' => 'PUT']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('product_service_id', __('Product'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <select name="product_service_id" class="form-control" id="product_service_id" required>
                        <option value="">{{ __('Select Product') }}</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if ($sale->product_service_id == $product->id) selected @endif>
                                {{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('customer_id', __('Customer'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <select name="customer_id" class="form-control" id="customer_id" required>
                        <option value="">{{ __('Select Customer') }}</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" @if ($sale->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('driver_id', __('Driver'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <select name="driver_id" class="form-control" id="driver_id" required>
                        <option value="">{{ __('Select Driver') }}</option>
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}"  @if ($sale->driver_id == $driver->id) selected @endif>{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                {{ Form::label('quantity', __('Quantity'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ $sale->quantity }}" required>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('rate', __('Rate'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="rate" id="rate" class="form-control"
                        value="{{ $sale->rate }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('vat', __('Vat'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="vat" id="vat" class="form-control"
                        value="{{ $sale->vat }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('location', __('Location'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="location" id="location" class="form-control"
                        value="{{ $sale->location }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('lpo', __('LPO'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="lpo" id="lpo" class="form-control"
                        value="{{ $sale->lpo }}">
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <input type="submit" value="{{ __('Update') }}" class="btn-create badge-blue">
            <input type="button" value="{{ __('Cancel') }}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>
