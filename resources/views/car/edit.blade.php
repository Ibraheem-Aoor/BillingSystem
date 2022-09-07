<div class="card bg-none card-box">
    {{ Form::model($car, ['route' => ['car.update', $car->id], 'method' => 'PUT']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('no', __('No'), ['class' => 'form-control-label']) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{ Form::text('no', null, ['class' => 'form-control', 'required' => 'required']) }}
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
