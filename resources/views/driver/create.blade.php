<div class="card bg-none card-box">
    {{ Form::open(['url' => 'driver']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name', __('Driver Name'), ['class' => 'form-control-label']) }} <span
                    class="text-danger">*</span>
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('mobile', __('Driver Mobile'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{ Form::text('mobile', '', ['class' => 'form-control']) }}
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
