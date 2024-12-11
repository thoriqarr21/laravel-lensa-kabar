@extends('authentication.master')

@section('title', 'Login')


@section('content')

    <div class="login-box">
        <div class="login-logo">
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

        <div class="login-box-body" style="border-radius: 8px; height: 410px; box-shadow: 0px 0px 15px 3px  black;">
            <h3 class="login-box-msg" style="font-weight: 700; color: rgb(83, 83, 83); margin-top:5px">WELCOME</h3>
            <h5 class="login-box-msg" style="font-weight: 500; color: rgb(83, 83, 83); text-align:start">Sign in your account</h5>
            {{-- <div class="" style="height:1px; background-color:rgb(184, 184, 184); border-radius: 5px; margin-left: 180px; width: 135px"></div>
            <div class="" style="height:1px; background-color:rgb(184, 184, 184); border-radius: 5px; margin-bottom: 30px; width: 135px"></div> --}}
            <div class="garis-2" style="height:1px; background-color:rgb(71, 129, 217); border-radius: 5px; margin: 0 auto 2px 8px; width: 150px;"></div>
            <div class="garis-2" style="height:1px; background-color:rgb(53, 228, 50); border-radius: 5px; margin: 0 auto 15px 8px; width: 150px;"></div>
            <div class="garis-1" style="height:1px; background-color:rgb(71, 129, 217); border-radius: 5px; margin: 0 8px 30px auto; width: 130px;"></div>

            @if (session()->has('errorcredentials'))
                <div class="text-center has-error">
                    <span class="help-block">
                        <strong>{!! session()->get('errorcredentials') !!}</strong>
                    </span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf 
                
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email"  style="border-radius: 5px; height: 40px">
                    <span class="glyphicon glyphicon-envelope form-control-feedback" style="align-content: center; height: 40px"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" style="border-radius: 5px; height: 40px;">
                    <span class="glyphicon glyphicon-lock form-control-feedback" style="align-content: center; height: 40px"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="btn-submit" style="margin-top: 25px">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius: 5px; font-size: 16px">Sign In</button>
                </div>
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </form>
            <div class="text-center" style="margin-top: 60px">        
                <a href="{{ route('register') }}">Register a new membership</a>
            </div>

            {{-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook
                </a>
                <a href="{{ route('login.google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+
                </a>
            </div> --}}

            {{-- <a href="#">I forgot my password</a><br> --}}

            {{-- <div class="text-center" style="background-color: blue; z-index: 1000; width: 100%; display: block;">
                <h3  style="font-weight: 700; color: rgb(108, 108, 108); margin-bottom: 10px">Welcome</h3>
            </div> --}}
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@endpush