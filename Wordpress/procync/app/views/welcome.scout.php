@extends('layouts.main')

@section('main')

	<div class="top-bar"></div>
    <div class="row intro-logo top-gap-md">
        <div class="col-xs-12 text-center"><a href="{{ get_bloginfo('url') . '/reporting' }}"><img src="/content/themes/procync/app/assets/images/logo.png" alt="Procync"></a></div>
    </div>

	<div class="row">
		<div class="col-sm-6 text-center">
			<a href="{{ get_bloginfo('url') .'/surveytest' }}" class="procync-test">Survey Test</div>
		</div>
		<div class="col-sm-6 text-center">
			<a href="{{ get_bloginfo('url') .'/reportingtest' }}" class="procync-test">Reporting Test</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			<div class="procync-msg top-gap-md">WELCOME TO PROCYNC!</div>
		</div>
	</div>

@stop