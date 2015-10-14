@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

	<div class="container">
		<div class="row">
			{{ Former::open()->id('MyForm')->secure()->rules(['name' => 'required'])->method('POST')->autocomplete('off')}}
			<div class="col-sm-6">

				{{ Former::legend('Task Group 1') }}
				{{ Former::sm_text('group1_name')->label('Name')->require() }}
				{{ Former::select('group1_order')->options(array('1' => 1,'2' => 2,'3' => 3,'4' => 4)) }}

				{{ Former::legend('Task Group 2') }}
				{{ Former::sm_text('group2_name')->label('Name')->require() }}
				{{ Former::select('group2_order')->options(array('1' => 1,'2' => 2,'3' => 3,'4' => 4)) }}

			</div>
			<div class="col-sm-6">
				{{ Former::legend('Task Group 3') }}
				{{ Former::sm_text('group3_name')->label('Name')->require() }}
				{{ Former::select('group3_order')->options(array('1' => 1,'2' => 2,'3' => 3,'4' => 4)) }}

				{{ Former::legend('Task Group 4') }}
				{{ Former::sm_text('group4_name')->label('Name')->require() }}
				{{ Former::select('group4_order')->options(array('1' => 1,'2' => 2,'3' => 3,'4' => 4)) }}

				{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}
			</div>
			{{ Former::close() }}
		</div>

		<hr>

		<div class="pull-right">
			<div class="pull-right">
				<a href="{{{ URL::to('admin/tasktemplates/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</div>

		<table width="100%" class="table table-condensed table-hover" id="table-events">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th width="100px">Title</th>
					<th width="20px">Deadline Gap</th>
					<th width="20px">Group</th>
					<th width="20px">Actions</th>
				</tr>
			</thead>
			<tbody>
			</tbody>

		</table>
	</div>

@stop


{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {

				'use strict';

				var table = $('#table-events').dataTable( {
				"sDom": "<'row'<'col-md-6'<'row'<'col-xs-6'l><'col-xs-6 text-right'r>>><'col-md-6'f>>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "iDisplayLength" : 10,
		        "sAjaxSource": "{{ URL::to('/admin/tasks/data') }}",
			});
		});
	</script>
@stop

