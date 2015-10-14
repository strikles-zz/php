<h4>Hospitality Details</h4>
@if (isset($model))
	@foreach($model->documents as $document)
		<div class="row">
			<div class="col-sm-8">
				{{{ $document->name }}}
			</div>
			<div class="col-sm-4">
				<div class="btn-group">
					<button type="button"
						data-action="edit"
						data-type= "documents"
						data-parent-type="{{ get_class($model) }}"
						data-id="{{ $document->id }}"
						data-parent-id="{{ isset($model) ? $model->id : 0 }}"
						data-parent-title="{{ isset($model) ? $model->name : '' }}"
						class="ajax btn btn-xs fa fa-pencil"></button>
					<button type="button" data-action="{{ URL::to($controller .'/' . $model->id . '/documents/' . $document->id . '/detach' ) }}" class="modal-popup btn btn-xs fa fa-unlink"></button>
					<button type="button" data-action="{{ URL::to('documents/' . $document->id . '/delete' ) }}" class="modal-popup btn btn-xs btn-delete fa fa-trash"></button>
				</div>
			</div>
		</div>
	@endforeach
@endif
<a href="{{{ URL::to('documents/create') }}}" class="btn btn-sm btn-info ajax"
	data-action="create"
	data-type="documents"
	data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
	data-parent-id="{{ isset($model) ? $model->id : 0 }}"
	data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> Add Document</a>

