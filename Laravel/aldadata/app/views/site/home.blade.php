@extends('site.layouts.default')
{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site.contact_us') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')

<div class="row page-home">
	<div class="col-sm-12">
		<h1 class="text-center">Dashboard</h1>

		<div class="row" style="margin-top: 100px;">
			<div class="col-sm-2 col-sm-offset-3">
				<a id="link-companies" href="{{{ URL::to('companies') }}}"></a>
			</div>
			<div class="col-sm-2">
				<a id="link-venues" href="{{{ URL::to('venues') }}}"></a>
			</div>
			<div class="col-sm-2">
				<a id="link-contacts" href="{{{ URL::to('contacts') }}}"></a>
			</div>
		</div>


	</div>
</div>

@stop
