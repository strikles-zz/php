@extends('site.layouts.promoters')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.settings') }}} ::
@parent
@stop

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header" style="margin-top: 100px;">
	<h3>Edit your settings</h3>
</div>
<form class="form-horizontal" method="post" action="{{ URL::to('/user') }}"  autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">

        <!-- first name -->
        <div class="form-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="first_name">First Name</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{{ Input::old('first_name', $user->first_name) }}}" />
                {{ $errors->first('first_name', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ first name -->

        <!-- last name -->
        <div class="form-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="last_name">Last Name</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="last_name" id="last_name" value="{{{ Input::old('last_name', $user->last_name) }}}" />
                {{ $errors->first('last_name', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ last name -->

        <!-- Password -->
        <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="password">Password</label>
            <div class="col-md-10">
                <input class="form-control" type="password" name="password" id="password" value="" />
                {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ password -->

        <!-- Password Confirm -->
        <div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
            <div class="col-md-10">
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
                {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ password confirm -->
    </div>
    <!-- ./ general tab -->

    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-black">Update</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>

@stop
