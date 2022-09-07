<div class="card bg-none card-box">
    {{ Form::model($list, ['route' => ['price-list.update', $list->id], 'method' => 'PUT']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('customer_id', __('Customer'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <select name="customer_id" class="form-control" id="customer_id" required>
                        <option value="">{{ __('Select Customer') }}</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" @if ($list->customer_id == $customer->id) selected @endif>
                                {{ $customer->name }}</option>
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
                            <option value="{{ $product->id }}" @if ($list->product_service_id == $product->id) selected @endif>
                                {{ $product->name }}</option>
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
                    <input type="text" name="selling_price" id="selling_price" class="form-control" value="{{$list->selling_price}}"  required>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('vat', __('Vat Value'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="vat" id="vat" value="{{$list->vat}}" class="form-control">
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
