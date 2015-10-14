<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">
			{{{ $title }}}
			@if(isset($subtitle))
				({{{ $subtitle }}})
			@endif
		</h1>
		@if(Session::has('message'))
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{ Session::get('message') }}
			</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		{!! Form::open() !!}

			<div class="form-group">
				{!! Form::label('Name') !!}
				{!! Form::text('name', (isset($group) ? $group->name : null), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Desription') !!}
				{!! Form::text('description', (isset($group) ? $group->description : null), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Country') !!}
				{!! Form::text('country', (isset($group) ? $group->country : null), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('City') !!}
				{!! Form::text('city', (isset($group) ? $group->city : null), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>

			@if(isset($gusers))
			<div class="form-group">
				{!! Form::label('Chairman') !!}
				{!! Form::select('chairman_id', $gusers, null, array('class'=>'form-control chosen-select')) !!}
			</div>
			@endif

			<div class="form-group">
			    {!! Form::submit((isset($group) ? 'Update Group' : 'Create Group'), array('class'=>'btn btn-primary')) !!}
			</div>

		{!! Form::close() !!}

	</div>
</div>
