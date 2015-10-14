@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="row" id="page-login" style="margin-top:20%;">

    <div class="col-sm-5"></div>
    <div class="col-sm-4">
        <div class="row">

            <form class="form-horizontal" method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="logo-signin">
                    <span class="glyphicon glyphicon-log-in"></span>
                </div>

                <fieldset>
                    <div class="form-group">
                        <!-- <label class="col-md-2 control-label" for="email">{{ Lang::get('confide::confide.username_e_mail') }}</label> -->
                        <div class="col-xs-10 col-xs-offset-1">
                            <input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
    <!--                    <label class="col-md-2 control-label" for="password">
                            {{ Lang::get('confide::confide.password') }}
                        </label> -->
                        <div class="col-xs-10 col-xs-offset-1">
                            <input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">
                        </div>
                    </div>

                    {{--
                    @if ( Session::get('error') )
                    <div class="alert alert-danger col-md-10">{{ Session::get('error') }}</div>
                    @endif

                    @if ( Session::get('notice') )
                    <div class="alert col-md-10">{{ Session::get('notice') }}</div>
                    @endif
                    --}}

                    <div class="form-group">
                        <div class="col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="checkbox" style="padding-top:0px;">
                                        <label for="remember">{{ Lang::get('confide::confide.login.remember') }}
                                            <input type="hidden" name="remember" value="0">
                                            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                                        </label>
                                    </div>
                                    <a href="forgot" style="color:#000;">{{ Lang::get('confide::confide.login.forgot_password') }}</a>
                                </div>
                                <div class="col-xs-3 col-xs-offset-1 text-right">
                                    <button tabindex="3" type="submit" class="btn btn-primary btn-black">{{ Lang::get('confide::confide.login.submit') }}</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </fieldset>

            </form>

        </div>
    </div>
    <div class="col-sm-3"></div>
</div>

@stop
