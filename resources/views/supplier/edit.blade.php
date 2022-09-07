<div class="card bg-none card-box">
    {{ Form::model($supplier, ['route' => ['supplier.update', $supplier->id], 'method' => 'PUT']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name', __('Suypplier Name'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('mobile', __('Supplier Mobile'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{ Form::text('mobile', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('trn', __('TRN'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{ Form::text('trn', null, ['class' => 'form-control']) }}
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
