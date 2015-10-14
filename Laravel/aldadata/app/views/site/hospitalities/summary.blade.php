<div class="row">
	<div class="col-md-12">
		<legend>Hospitality details <span class="badge">{{ isset($model) ? count($model->hospitality) : '' }}</span></legend>
	</div>
</div>
@if (isset($model) && isset($model->hospitality))
	@foreach($model->hospitality()->get() as $hospitality_details)
	<?php //dd($hospitality);?>
		<div class="row">
		<div class="col-sm-8">
			{{{ $hospitality_details->id }}}
		</div>
		<div class="col-sm-4">
			<div class="btn-group">
				<button type="button"
					data-action="edit"
					data-type= "hospitalities"
					data-parent-type="{{ strtolower(get_class($model)) }}"
					data-id="{{ $hospitality_details->id }}"
					data-parent-id="{{ isset($model) ? $model->id : 0 }}"
					data-parent-title="{{ isset($model) ? $model->name : '' }}"
					class="ajax btn btn-xs fa fa-pencil"></button>
				<button type="button" data-action="{{ URL::to($controller .'/' . $model->id . '/hospitalities/' . $hospitality_details->id . '/detach' ) }}" class="modal-popup btn btn-xs fa fa-unlink"></button>
				<button type="button" data-action="{{ URL::to('hospitalities/' . $hospitality_details->id . '/delete' ) }}" class="modal-popup btn btn-xs btn-delete fa fa-trash"></button>
			</div>
		</div>
	</div>
	@endforeach
@endif
<div class="row">
	<div class="col-md-5">
		<div class="h4">
			<a href="{{{ URL::to('hospitalities/create') }}}" class="btn btn-xs btn-black ajax"
				data-action="create"
				data-type="hospitalities"
				data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
				data-parent-id="{{ isset($model) ? $model->id : 0 }}"
				data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> Add hospitality details</a>
		</div>
	</div>
</div>