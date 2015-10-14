@extends('admin.layouts.ajax')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{ $title }}
		</h3>
	</div>

	<!-- Nav tabs -->
	<div class="tabbable parentTabs">
		<ul class="nav nav-tabs" id="company_tabs">
			<li class="active company_info"><a href="#info">Info</a></li>
			<li class="company_hosting"><a href="#hosting">Hosting</a></li>
			<li class="company_projects"><a href="#projecten">Projecten</a></li>
			<li class="company_worklog"><a href="#werk-log">Werk log</a></li>
			<li class="company_strippenkaart"><a href="#strippenkaarten">Strippenkaarten</a></li>
			<li class="company_subscriptions"><a href="#abonnementen">Abonnementen</a></li>
			<li class="company_accounting"><a href="#accounting">Accounting</a></li>
			<li class="company_reporting"><a href="#reporting">Reporting</a></li>
			<li class="company_other"><a href="#overig">Overig</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade active in" id="info">
				@include('admin.companies.info.index')
			</div>

			<div class="tab-pane fade" id="hosting">
				@include('admin.companies.hosting.index')
			</div>

			<div class="tab-pane fade" id="projecten">
				@include('admin.companies.projects.index')
			</div>

			<div class="tab-pane fade" id="werk-log">
				@include('admin.companies.worklogs.index')
			</div>

			<div class="tab-pane fade" id="strippenkaarten">
				@include('admin.companies.strippenkaarten.index')
			</div>

			<div class="tab-pane fade" id="abonnementen">
				@include('admin.companies.subscriptions.index')
			</div>

			<div class="tab-pane fade" id="accounting">
				@include('admin.companies.accounting.index')
			</div>

			<div class="tab-pane fade" id="reporting">
				@include('admin.companies.reporting.index')
			</div>

			<div class="tab-pane" id="overig">
				@include('admin.companies.overig.index')
			</div>
		</div>
	</div>

	@if(Auth::check())
		<div class="userdump">{{ Auth::user()->id }}</div>
	@endif
@stop
