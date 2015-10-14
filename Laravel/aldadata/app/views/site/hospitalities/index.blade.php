@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			Hospitality

			<div class="pull-right">
				<a href="{{{ URL::to('iframe') }}}"
					class="btn btn-small btn-black iframe"
					data-type="hospitalities"
					data-action="create"
					data-id="0">
				<span class="glyphicon glyphicon-plus-sign"></span> Create</a>
		</h3>
	</div>

	<table id="roles" class="table table-condensed table-hover">
		<thead>
			<tr>
				<th class="col-md-6">{{{ Lang::get('admin/roles/table.name') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>

@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {
				oTable = $('#roles').dataTable( {
				"sDom": "<'row'<'col-md-6'<'row'<'col-xs-6'l><'col-xs-6 text-right'r>>><'col-md-6'f>>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "iDisplayLength" : 10,
		        "sAjaxSource": "{{ URL::to('hospitalities/data') }}",
		        /*"fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}*/
			});
		});
	</script>
@stop