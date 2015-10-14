@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ 'Set Password' }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
    <div class="page-header">
        <h1>Set Password</h1>
    </div>
    <div class="forgot_passwd">
        {{ Confide::makeForgotPasswordForm() }}
    </div>
</div>

@stop
