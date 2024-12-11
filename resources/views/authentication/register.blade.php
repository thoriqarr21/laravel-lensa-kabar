@extends('authentication.master')

@section('title', 'Register')


@section('content')

    <div class="register-box">

        <div class="register-logo">
            <a href="{{ route('home') }}">
                @if(isset($setting) && $setting['site_logo'])
                    <img src="{{ asset('images/'.$setting['site_logo']) }}" alt="Logo">
                @elseif(isset($setting) && $setting['site_name'])
                    {{ $setting['site_name'] }}
                @else
                    <b>LENSA</b> KABAR
                @endif
            </a>
        </div>

        <div class="register-box-body" style="border-radius: 8px; box-shadow: 0px 0px 15px 3px  rgb(89, 89, 89);">
            <h3 class="login-box-msg" style="font-weight: 700; color: rgb(83, 83, 83); margin-bottom: 10px">REGISTER</h3>
           
            <form action="{{ route('register') }}" method="post">
                @csrf 
                
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" style="border-radius: 5px">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <em>{{ $errors->first('name') }}</em>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" style="border-radius: 5px">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <em>{{ $errors->first('email') }}</em>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" style="border-radius: 5px">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <em>{{ $errors->first('password') }}</em>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" style="border-radius: 5px">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12" style="margin-top: 10px">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius: 5px">Register</button>
                    </div>
                </div>
            </form>
            <div class="text-center" style="margin-top: 30px">
                <a href="{{ route('login') }}" style="font-weight: 500">I already have a membership</a>
            </div>
        </div>

    </div>

@endsection