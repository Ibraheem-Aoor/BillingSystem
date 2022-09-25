<div class="card bg-none card-box">
    {{ Form::open(['url' => 'price-list']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('customer_id', __('Customer'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <select name="customer_id" class="form-control" id="customer_id" required>
                        <option value="">{{ __('Select Customer') }}</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('product_service_id', __('Product'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <select name="product_service_id" class="form-control" id="product_service_id" required>
                        <option value="">{{ __('Select Product') }}</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                {{ Form::label('selling_price', __('Sellign Price'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <input type="text" name="selling_price" id="selling_price" class="form-control" required>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('vat', __('Vat Value'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="vat" id="vat" class="form-control" value="{{$vat}}">
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="col-12 text-right">
            <input type="submit" value="{{ __('Create') }}" class="btn-create btn-xs badge-blue radius-10px">
        </div>
    </div>
</div>
{{ Form::close() }}
</div>
