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
                {{ Form::label('driver_id', __('Driver'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <select name="driver_id" class="form-control" id="driver_id" required>
                        <option value="">{{ __('Select Driver') }}</option>
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
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
                    <input type="text" name="vat" id="vat" class="form-control"
                        value="{{ $vat }}">
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
        <div class="col-md-6">
            {{ Form::label('date', __('date'), ['class' => 'form-control-label']) }}
            <input required type="date" name="date" id="date"
                style="padding:5px !important; line-height:1.5rem !important;">
        </div>
        <div class="col-md-6">
            {{ Form::label('car', __('car'), ['class' => 'form-control-label']) }}
            <select name="car_id" class="form-control" id="car" required>
                <option value="">{{ __('Select Vechile') }}</option>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->no }}</option>
                @endforeach
            </select>
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


<script>
    $(document).on('change', 'select[name="customer_id"]', function() {
        var customer_id = $(this).val();
        var product_id = $('select[name="product_service_id"]').val();
        var route = "get-product-price";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: route,
            type: 'GET',
            data: {
                product_id: product_id,
                customer_id: customer_id,
            },
            success: function(response) {
                if (response.status)
                    $('#rate').val(response.rate);
            },
            error: function(response) {
                if (response.status == 419) {
                    alert('There Is No Price For Selected Customer');
                }
            }
        });
    });
</script>
