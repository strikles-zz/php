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

		<form method="POST" action={!! URL::to("admin/groups/$group->id/update") !!} accept-charset="UTF-8" enctype="multipart/form-data" id="group_edit">
			<!-- <input name="_method" type="hidden" value="PUT" id="_method"> -->
			<input name="_token" type="hidden" value={!! Session::getToken() !!} id="_token">
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" name="name" type="text" value={!! $group->name !!} id="name">
			</div>
			<div class="form-group">
				<label for="email">Description</label>
				<input class="form-control" name="description" type="text" value={!! $group->description !!} id="description">
			</div>
			<div class="form-group">
				<label for="country">Country</label>
				<input class="form-control" name="country" type="text" value={!! $group->country !!} id="country">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input class="form-control" name="city" type="text" value={!! $group->city !!} id="city">
			</div>


			@if(isset($gusers))
			<div class="form-group">
				<label for="chairman_sel">Chairman</label>
				<select class="form-control chosen-select" id="chairman_sel" name="chairman_sel" form="group_edit">
					@foreach ($gusers as $guser)
    				<option value={!! $guser->id !!}>{!! $guser->name !!}</option>
    				@endforeach
    			</select>
			</div>
			@endif

			<div class="form-group">
				<input class="btn btn-primary" type="submit" value="Save">
				<a href={!! URL::to("/admin/groups") !!} class="btn btn-default">Cancel</a>
			</div>
		</form>

	</div>
</div>


<div class="container-fluid">
	<div class="row">
		<h4>Associate user with groups</h4>
	</div>

	<div class="row">
		<form method="POST" action={{{ URL::to("/admin/users/$user->id/groups") }}} accept-charset="UTF-8" class="inline-block" id="groupassoc">
			<input name="_token" type="hidden" value={!! Session::getToken() !!} id="_token">
			<select class="html-multi-chosen-select" multiple="multiple" name='groupassoc[]' form="groupassoc">
				@foreach ($all_groups as $agroup)
					<option value="{!! $agroup->id !!}">{!! $agroup->name !!}</option>
				@endforeach
			</select>
			<button class="btn btn-sm btn-submit" type="submit" data-toggle="tooltip" title="" data-original-title="Submit">Submit</button>
		</form>
	</div>

</div>
