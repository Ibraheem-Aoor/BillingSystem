<x-guest-layout>
    <x-auth-card>

@php
    $logo=asset(Storage::url('uploads/logo/'));
$company_logo=App\Models\Utility::getValByName('company_logo');
@endphp
@section('page-title')
    {{__('Forgot Password')}}
@endsection
@section('content')
    <div class="login-contain">
        <div class="login-inner-contain">
            <a class="navbar-brand" href="#">
                <img src="{{$logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')}}" class="navbar-brand-img big-logo" alt="logo">
            </a>
            <div class="login-form">
                <div class="page-title"><h5>{{__('Reset Password')}}</h5></div>
                {{Form::open(array('route'=>'vender.password.update','method'=>'post','id'=>'loginForm'))}}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    {{Form::label('email',__('E-Mail Address'),['class'=>'form-control-label'])}}
                    {{Form::text('email',null,array('class'=>'form-control'))}}
                    @error('email')
                    <span class="invalid-email text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{Form::label('password',__('Password'),['class'=>'form-control-label'])}}
                    {{Form::password('password',array('class'=>'form-control'))}}
                    @error('password')
                    <span class="invalid-password text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{Form::label('password_confirmation',__('Password Confirmation'),['class'=>'form-control-label'])}}
                    {{Form::password('password_confirmation',array('class'=>'form-control'))}}
                    @error('password_confirmation')
                    <span class="invalid-password_confirmation text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{Form::submit(__('Reset Password'),array('class'=>'btn-login','id'=>'resetBtn'))}}
                {{Form::close()}}
            </div>
            <h5 class="copyright-text">
                {{(App\Models\Utility::getValByName('footer_text')) ? App\Models\Utility::getValByName('footer_text') :  __('Copyright AccountGo') }} {{ date('Y') }}
            </h5>
        </div>
    </div>
@endsection
    </x-auth-card>
</x-guest-layout>