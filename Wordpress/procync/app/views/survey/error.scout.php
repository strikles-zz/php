<!-- View stored in app/views/welcome.scout.php -->
@extends('layouts.main')

@section('main')

	<div class="top-bar"></div>
    <div class="row intro-logo top-gap-lg">
        <div class="col-xs-12 text-center">
            <div class="col-xs-12 text-center"><a href="{{ get_bloginfo('url') . '/reporting' }}"><img src="/content/themes/procync/app/assets/images/logo.png" alt="Procync"></a></div>
        </div>
    </div>

	<div class="error-msg text-center top-gap-sm">{{ $error }}</div>

@stop
