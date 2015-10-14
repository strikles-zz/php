<div class="row">
	<div class="col-md-12">
		<legend>Companies <span class="badge">{{ isset($model) ? count($model->companies) : '' }}</span></legend>
	</div>
</div>
@if (isset($model))
	@foreach($model->companies as $company)
		<div class="row">
			<div class="col-sm-5">
				{{{ $company->name }}}
			</div>
			<div class="col-sm-3">
				{{{ $company->type }}}
			</div>
			<div class="col-sm-4">
				<div class="btn-group">
					<button type="button"
						data-action="edit"
						data-type= "companies"
						data-parent-type="{{ strtolower(get_class($model)) }}"
						data-id="{{ $company->id }}"
						data-parent-id="{{ isset($model) ? $model->id : 0 }}"
						data-parent-title="{{ isset($model) ? $model->name : '' }}"
						class="ajax btn btn-xs fa fa-pencil"></button>
					<button type="button" data-action="{{ URL::to($controller .'/' . $model->id . '/companies/' . $company->id . '/detach' ) }}" class="modal-popup btn btn-xs fa fa-unlink"></button>
					<button type="button" data-action="{{ URL::to('companies/' . $company->id . '/delete' ) }}" class="modal-popup btn btn-xs btn-delete fa fa-trash"></button>
				</div>
			</div>
		</div>
	@endforeach
@endif
<div class="row">
	<div class="col-md-5">
		<div class="h4">
			<a href="{{{ URL::to('companies/create') }}}" class="btn btn-xs btn-black ajax"
				data-action="create"
				data-type="companies"
				data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
				data-parent-id="{{ isset($model) ? $model->id : 0 }}"
				data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> Add new company</a>
		</div>
	</div>
</div>