<div class="card bg-none card-box">
    {{ Form::open(['url' => 'sale']) }}
    <div class="row">

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
                {{ Form::label('quantity', __('Quantity'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('rate', __('Rate'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="rate" id="rate" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('vat', __('Vat'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="vat" id="vat" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('location', __('Location'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="location" id="location" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('lpo', __('LPO'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <input type="text" name="lpo" id="lpo" class="form-control">
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
