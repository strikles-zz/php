@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ 'Reset Password' }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="page-header">
        <h1>Set Password</h1>
    </div>
    <div class="forgot_passwd">
        {{ Confide::makeResetPasswordForm($token)->render() }}
    </div>
</div>
@stop
