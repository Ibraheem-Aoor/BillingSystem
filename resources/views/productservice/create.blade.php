<div class="card bg-none card-box">
    {{ Form::open(['url' => 'productservice']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }} <span class="text-danger">*</span>
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('sku', __('SKU'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-key"></i></span>
                    {{ Form::text('sku', '', ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'), ['class' => 'form-control-label']) }}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('sale_price', __('Sale Price'), ['class' => 'form-control-label']) }}<span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <span><i class="fas fa-money-bill-alt"></i></span>
                    {{ Form::number('sale_price', '', ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('purchase_price', __('Purchase Price'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <span><i class="fas fa-money-bill-alt"></i></span>
                    {{ Form::number('purchase_price', '', ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) }}
                </div>
            </div>
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('tax_id', __('Tax'), ['class' => 'form-control-label']) }}
            {{ Form::select('tax_id[]', $tax, null, ['class' => 'form-control select2', 'multiple']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('category_id', __('Category'), ['class' => 'form-control-label']) }}
            {{ Form::select('category_id', $category, null, ['class' => 'form-control select2']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('unit_id', __('Unit'), ['class' => 'form-control-label']) }}
            {{ Form::select('unit_id', $unit, null, ['class' => 'form-control select2']) }}
        </div>
        @if (!$customFields->isEmpty())
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="tab-pane fade show" id="tab-2" role="tabpanel">
                    @include('customFields.formBuilder')
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <input type="submit" value="{{ __('Create') }}" class="btn-create badge-blue">
            <input type="button" value="{{ __('Cancel') }}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>
